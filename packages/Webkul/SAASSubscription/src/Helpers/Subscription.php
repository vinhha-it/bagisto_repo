<?php

namespace Webkul\SAASSubscription\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\SAASCustomizer\Facades\Company;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;
use Webkul\SAASSubscription\Notifications\PlanExpired;
use Webkul\SAASSubscription\Repositories\AddressRepository;
use Webkul\SAASSubscription\Repositories\InvoiceRepository;
use Webkul\SAASSubscription\Repositories\PlanRepository;
use Webkul\SAASSubscription\Repositories\PurchasedPlanRepository;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;

class Subscription
{
    /* Payement due */

    const PAYMENT_DUE = 'Payment Due';

    /* Period montly */
    const PERIOD_MONTH = 'month';

    /* Period infinte status */
    const PERIOD_INFINITE = 'infinite';

    /* Payment status */
    const PAYMENT_STATUS = 'Success';

    /* Free type plan status */
    const TYPE_FREE = 'free';

    /* Trial period plans status */
    const TYPE_TRIAL = 'trial';

    /* Manual plan status */
    const TYPE_MANUAL = 'manual';

    /* Plan activation type */
    const TYPE_PAYPAL = 'paypal';

    /* Payment method */
    const PAYMENT_METHOD = 'Paypal';

    /* Fixed price offer */
    const OFFER_FIXED = 'fixed';

    /**
     * Create a new helper instance.
     *
     * @return void
     */
    public function __construct(
        protected CompanyRepository $companyRepository,
        protected PlanRepository $planRepository,
        protected RecurringProfileRepository $recurringProfileRepository,
        protected AddressRepository $addressRepository,
        protected PurchasedPlanRepository $purchasedPlanRepository,
        protected InvoiceRepository $invoiceRepository,
        protected CoreConfigRepository $coreConfigRepository
    ) {
    }

    /**
     * Retunns company's current recurring profile
     *
     * @param  \Webkul\SAASCustomizer\Contracts\Company  $company
     * @return \Webkul\SAASSubscription\Contracts\RecurringProfile
     */
    public function getCurrentRecurringProfile($company = null)
    {
        $company = ! empty($company) ? $company : Company::getCurrent();

        return $this->recurringProfileRepository->where('company_id', $company->id)->latest()->first();
    }

    /**
     * Activates trial plan
     *
     * @param  \Webkul\SAASCustomizer\Contracts\Company  $company
     * @return \Webkul\SAASSubscription\Contracts\RecurringProfile|void
     */
    public function activateTrial($company = null)
    {
        $company = $company ? $company : Company::getCurrent();

        // Extension Assignment
        if (company()->getSuperConfigData('subscription.payment.module.status')) {
            $this->disabledPlanExtensions($company, []);
        }

        if (
            ! company()->getSuperConfigData('subscription.payment.trail_plan.allow_trial')
            || ! company()->getSuperConfigData('subscription.payment.trail_plan.trial_days')
        ) {
            return;
        }

        $plan = $this->planRepository->find(company()->getSuperConfigData('subscription.payment.trail_plan.trial_plan'));

        if (! $plan) {
            return;
        }

        DB::beginTransaction();

        try {
            $cycleExpiredOn = Carbon::now();

            $cycleExpiredOn->addDays(company()->getSuperConfigData('subscription.payment.trail_plan.trial_days'));

            $cart = [
                'plan'             => $plan,
                'amount'           => 0,
                'period_unit'      => 'month',
                'customer_email'   => $company->email,
                'customer_name'    => $company->username,
                'type'             => self::TYPE_TRIAL,
                'cycle_expired_on' => $cycleExpiredOn,
                'next_due_date'    => null,
                'payment_status'   => self::PAYMENT_STATUS,
                'company'          => $company,
            ];

            session()->put('subscription_cart', $cart);

            $recurringProfile = $this->createRecurringProfile([
                'PROFILESTATUS' => 'ActiveProfile',
                'PROFILEID'     => null,
                'company'       => $company,
            ]);

            $invoice = $this->createInvoice([
                'recurring_profile'                      => $recurringProfile,
                'saas_subscription_purchased_plan_id'    => $recurringProfile->purchased_plan->id,
                'saas_subscription_recurring_profile_id' => $recurringProfile->id,
                'grand_total'                            => 0,
                'cycle_expired_on'                       => $cycleExpiredOn,
                'customer_email'                         => $recurringProfile->company->email,
                'customer_name'                          => $recurringProfile->company->username,
                'payment_method'                         => self::PAYMENT_METHOD,
                'status'                                 => self::PAYMENT_STATUS,
            ]);

            $this->recurringProfileRepository->update([
                'saas_subscription_invoice_id' => $invoice->id,
            ], $recurringProfile->id);
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        DB::commit();

        return $recurringProfile;
    }

    /**
     * Disabled Module Extensions
     *
     * @param  \Webkul\SAASCustomizer\Contracts\Company  $company
     * @param  \Webkul\SAASSubscription\Contracts\Plan  $plan
     * @return void
     */
    public function disabledPlanExtensions($company, $plan)
    {
        $planModules = [];

        if (! empty($plan->modules)) {
            $planModules = json_decode($plan->modules, true);
        }

        $allowExtensions = config('saas-extensions');

        if ($allowExtensions) {
            foreach ($allowExtensions as $module) {
                if (! in_array($module, $planModules)) {
                    $moduleStatus = $this->coreConfigRepository->findOneWhere([
                        'company_id'    => $company->id,
                        'code'          => $module,
                    ]);

                    if ($moduleStatus) {
                        $moduleStatus->value = 0;

                        $moduleStatus->save();
                    }
                }
            }
        }
    }

    /**
     * Disabled Module Extensions
     *
     * @return array
     */
    public function validateAllowExtensions()
    {
        $notAllowedExtensionKeywords = [];

        $saasExtensions = config('saas-extensions') ?? [];

        $company = Company::getCurrent();

        if (! empty($company)) {
            $recurringProfile = $this->recurringProfileRepository->where('company_id', $company->id)->latest()->first();

            $assignModules = [];

            if (! empty($recurringProfile->assign_modules)) {
                $assignModules = json_decode($recurringProfile->assign_modules, true);
            }

            foreach ($saasExtensions as $module) {
                $moduleIndexes = explode('.', $module);

                if (
                    ! in_array($module, $assignModules)
                    && ! empty($moduleIndexes[0])
                ) {
                    if (
                        ! empty($moduleIndexes[2])
                        && ($moduleIndexes[0] == 'sales'
                        || $moduleIndexes[0] == 'payment'
                        )
                    ) {
                        $notAllowedExtensionKeywords[] = $moduleIndexes[2];
                    } else {
                        $notAllowedExtensionKeywords[] = $moduleIndexes[0];
                    }
                }
            }
        }

        return $notAllowedExtensionKeywords;
    }

    /**
     * Activates manual plan
     *
     * @param  \Webkul\SAASCustomizer\Contracts\Company  $company
     * @param  array  $data
     * @return \Webkul\SAASSubscription\Contracts\RecurringProfile
     */
    public function activateManualPlan($company, $data)
    {
        DB::beginTransaction();

        try {
            $plan = $this->planRepository->find($data['plan']->id);

            $cart = [
                'plan'             => $plan,
                'amount'           => ($data['period_unit'] == 'month') ? $plan->monthly_amount : $plan->yearly_amount,
                'period_unit'      => $data['period_unit'],
                'customer_email'   => $company->email,
                'customer_name'    => $company->username,
                'type'             => self::TYPE_MANUAL,
                'payment_status'   => self::PAYMENT_STATUS,
                'cycle_expired_on' => null,
                'company'          => $company,
            ];

            session()->put('subscription_cart', $cart);

            $recurringProfile = $this->getCurrentRecurringProfile($company);

            // profile does not exist
            if (empty($recurringProfile)) {
                return;
            }

            $nextDueDate = $this->getNextDueDate($recurringProfile);

            $invoice = $this->createInvoice([
                'recurring_profile'                      => $recurringProfile,
                'saas_subscription_purchased_plan_id'    => $recurringProfile->purchased_plan->id,
                'saas_subscription_recurring_profile_id' => $recurringProfile->id,
                'grand_total'                            => $recurringProfile->amount,
                'cycle_expired_on'                       => $nextDueDate,
                'customer_email'                         => $recurringProfile->company->email,
                'customer_name'                          => $recurringProfile->company->username,
                'payment_method'                         => self::PAYMENT_METHOD,
                'status'                                 => self::PAYMENT_STATUS,
            ]);

            $this->recurringProfileRepository->update([
                'saas_subscription_invoice_id' => $invoice->id,
                'cycle_expired_on'             => $nextDueDate,
                'next_due_date'                => $nextDueDate,
                'saas_subscription_plan_id'    => $data['plan'],
                'schedule_description'         => $plan->name,
            ], $recurringProfile->id);
        } catch (\Exception $e) {

            DB::rollBack();

            throw $e;
        }

        DB::commit();

        return $recurringProfile;


    }

    /**
     * Activates free plan
     *
     * @param  \Webkul\SAASCustomizer\Contracts\Company  $company
     * @return \Webkul\SAASSubscription\Contracts\RecurringProfile
     */
    public function activateFreePlan($company = null)
    {
        $company = $company ? $company : Company::getCurrent();

        $plan = session()->get('subscription_cart.plan');

        DB::beginTransaction();

        try {
            $cart = [
                'plan'             => $plan,
                'amount'           => 0,
                'period_unit'      => self::PERIOD_INFINITE,
                'customer_email'   => $company->email,
                'customer_name'    => $company->username,
                'type'             => self::TYPE_FREE,
                'payment_status'   => self::PAYMENT_STATUS,
                'company'          => $company,
            ];

            session()->put('subscription_cart', $cart);

            $recurringProfile = $this->createRecurringProfile([
                'PROFILESTATUS' => 'ActiveProfile',
                'PROFILEID'     => null,
                'company'       => $company,
            ]);

            $invoice = $this->createInvoice([
                'recurring_profile'                      => $recurringProfile,
                'saas_subscription_purchased_plan_id'    => $recurringProfile->purchased_plan->id,
                'saas_subscription_recurring_profile_id' => $recurringProfile->id,
                'grand_total'                            => 0,
                'customer_email'                         => $recurringProfile->company->email,
                'customer_name'                          => $recurringProfile->company->username,
                'payment_method'                         => 'Free',
                'status'                                 => self::PAYMENT_STATUS,
            ]);

            $this->recurringProfileRepository->update([
                'saas_subscription_invoice_id' => $invoice->id,
            ], $recurringProfile->id);
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        DB::commit();

        return $recurringProfile;
    }

    /**
     * Creates recurring profiles
     *
     * @param  array  $response
     * @return \Webkul\SAASSubscription\Contracts\RecurringProfile
     */
    public function createRecurringProfile($response)
    {
        $cart = session()->get('subscription_cart');

        $company = $response['company'] ?? Company::getCurrent();

        $data = [];

        if ($cart['type'] == self::TYPE_MANUAL) {
            $data['payment_status'] = self::PAYMENT_STATUS;
        } elseif ($cart['type'] != self::TYPE_FREE) {
            if ($cart['type'] == self::TYPE_TRIAL) {
                $data['cycle_expired_on'] = $cart['cycle_expired_on'];
            } else {
                $data['next_due_date'] = $cart['cycle_expired_on'];

                $data['cycle_expired_on'] = $cart['cycle_expired_on'];

                $data['payment_status'] = self::PAYMENT_DUE;
            }
        }

        $currentRecurringProfile = $this->getCurrentRecurringProfile($company);

        $cart['recurring_profile'] = $recurringProfile = $this->recurringProfileRepository->create(array_merge($data, [
            'type'                      => $cart['type'],
            'state'                     => app(Paypal::class)->getProfileState($response['PROFILESTATUS']),
            'reference_id'              => $response['PROFILEID'],
            'schedule_description'      => $cart['plan']->name,
            'period_unit'               => $cart['period_unit'],
            'amount'                    => $cart['amount'],
            'company_id'                => $company->id,
            'tin'                       => $cart['tin'] ?? null,
            'saas_subscription_plan_id' => $cart['plan']->id,
            'payment_method'            => 'Paypal',
        ]));

        // Extension Assignment
        if (company()->getSuperConfigData('subscription.payment.module.status')) {
            $this->disabledPlanExtensions($company, $cart['plan']);

            $this->recurringProfileRepository->update([
                'assign_modules' => $cart['plan']->modules,
            ], $recurringProfile->id);
        }

        if (! empty($cart['address'])) {
            $this->addressRepository->create(array_merge($cart['address'], [
                'saas_subscription_recurring_profile_id' => $recurringProfile->id,
                'company_id'                             => $recurringProfile->company_id,
            ]));
        }

        $this->createPurchasedPlan($cart);

        if ($currentRecurringProfile) {
            $currentRecurringProfile->state = 'Cancel';

            if ($currentRecurringProfile->type == self::TYPE_PAYPAL) {
                app(Paypal::class)->updateRecurringProfileStatus($currentRecurringProfile);
            }

            $this->recurringProfileRepository->update([
                'state' => 'Cancelled',
            ], $currentRecurringProfile->id);

        }

        return $recurringProfile;
    }

    /**
     * Creates invoice
     *
     * @param  array  $data
     * @return \Webkul\SAASSubscription\Contracts\Invoice
     */
    public function createInvoice($data)
    {
        $data['invoice'] = $invoice = $this->invoiceRepository->create(array_merge($data, [
            'company_id' => $data['recurring_profile']->company_id,
        ]));

        if ($data['recurring_profile']->billing_address) {
            $data['billing_address'] = $data['recurring_profile']->billing_address->toArray();
        }

        if (! empty($data['billing_address'])) {
            $addressData = Arr::except($data['billing_address'], [
                'saas_subscription_recurring_profile_id',
            ]);

            $this->addressRepository->create(array_merge($addressData, [
                'saas_subscription_invoice_id' => $invoice->id,
                'company_id'                   => $invoice->company_id,
            ]));
        }

        return $invoice;
    }

    /**
     * Creates purchased plan
     *
     * @param  array  $cart
     * @return \Webkul\SAASSubscription\Contracts\PurchasedPlan
     */
    public function createPurchasedPlan($cart)
    {
        $purchasedPlan = $this->purchasedPlanRepository->create(array_merge($cart['plan']->toArray(), [
            'saas_subscription_recurring_profile_id' => $cart['recurring_profile']->id,
            'company_id'                             => $cart['recurring_profile']->company_id,
        ]));

        return $purchasedPlan;
    }

    /**
     * Returns next due date for payment
     *
     * @param  \Webkul\SAASSubscription\Contracts\RecurringProfile  $recurringProfile
     * @return \Carbon\Carbon
     */
    public function getNextDueDate($recurringProfile)
    {
        $lastDueDate = $recurringProfile->next_due_date
                       ? clone $recurringProfile->next_due_date
                       : Carbon::now();

        if ($recurringProfile->period_unit == self::PERIOD_MONTH) {
            $lastDueDateDay = $lastDueDate->format('d');

            $lastDueDate->modify('last day of next month');

            $lastDayOfNextMonth = $lastDueDate->format('d');

            if (in_array($lastDueDateDay, [29, 30, 31]) && $lastDayOfNextMonth < $lastDueDateDay) {
                $lastDueDate->modify('first day of next month');

                return Carbon::createFromTimeString($lastDueDate->format('Y-m-d 23:59:59'));
            } else {
                $lastDueDate = $recurringProfile->next_due_date
                               ? $recurringProfile->next_due_date
                               : Carbon::now();

                $lastDueDate->addMonth();

                return Carbon::createFromTimeString($lastDueDate->format('Y-m-d 23:59:59'));
            }
        } else {
            $lastDueDate->addYear();

            return Carbon::createFromTimeString($lastDueDate->format('Y-m-d 23:59:59'));
        }
    }

    /**
     * Checks if company is expired or not
     *
     * @param  int  $companyId
     * @return bool
     */
    public function isExpired($companyId)
    {
        $recurringProfile = $this->getCurrentRecurringProfile();

        if (! $recurringProfile) {
            return false;
        }

        $currentDateTime = Carbon::now();

        if (! $recurringProfile->cycle_expired_on) {
            return false;
        }

        $expirationDate = clone $recurringProfile->cycle_expired_on;

        $isExpired = $currentDateTime->getTimestamp() >= $expirationDate->getTimestamp() ? true : false;

        if (
            $isExpired
            && $recurringProfile->payment_status != self::PAYMENT_DUE
        ) {
            $this->recurringProfileRepository->update([
                'payment_status' => self::PAYMENT_DUE,
            ], $recurringProfile->id);
        }

        return $isExpired;
    }

    /**
     * Checks if company service is stopped or not
     *
     * @param  int|null  $companyId
     * @return bool
     */
    public function isServiceStopped($companyId = null)
    {
        $recurringProfile = $this->getCurrentRecurringProfile();

        if (! $recurringProfile) {
            return true;
        }

        $company = $companyId
                   ? $this->companyRepository->find($companyId)
                   : Company::getCurrent();

        //For setting Payment Due status
        $this->isExpired($company->id);

        if ($recurringProfile->type == self::TYPE_FREE) {
            return false;
        }

        $expirationDate = $recurringProfile->cycle_expired_on
                          ? clone $recurringProfile->cycle_expired_on
                          : clone $recurringProfile->created_at;

        if ($recurringProfile->state == 'Active'
            && ! in_array($recurringProfile->type, [self::TYPE_TRIAL, self::TYPE_MANUAL])
        ) {
            if ($recurringProfile->payment_status == 'Skipped') {
                $expirationDate->addDays(5);
            } else {
                $expirationDate->addDays(1);
            }
        }

        $isExpire = Carbon::parse($expirationDate)->isPast();

        if (
            $isExpire
            && ! $recurringProfile->is_mail_sent
        ) {
            try {
                $company = $this->companyRepository->findOrFail($recurringProfile->company_id);

                Mail::send(new PlanExpired($company));
            } catch (\Exception $e) {
            }

            $recurringProfile->is_mail_sent = true;

            $recurringProfile->save();
        }

        return $isExpire;
    }

    /**
     * Returns formated plans for checkout process
     *
     * @return array
     */
    public function getFormatedPlans()
    {
        $currencySymbol = config('app.currency');

        $allowTrail = $this->checkCompanyPurchasedPlan();

        $trialPlan = company()->getSuperConfigData('subscription.payment.trail_plan.allow_trial');

        $trialDays = company()->getSuperConfigData('subscription.payment.trail_plan.trial_days');

        $data = [];

        foreach ($this->planRepository->with('offer')->all() as $plan) {

            if (! (float) $plan->monthly_amount) {
                continue;
            }

            $amount = $plan->monthly_amount;

            if (
                ! empty($trialPlan)
                && $trialPlan == $plan->id
                && $trialDays
                && $allowTrail == true
            ) {
                $amount = 0;
            }

            if ($plan->offer->offer_status) {
                if ($plan->offer->type == self::OFFER_FIXED) {
                    $amount = $plan->monthly_amount - $plan->offer->price;

                    $plan->yearly_amount = $plan->yearly_amount - $plan->offer->price;
                } else {
                    $amount = $plan->monthly_amount - ($plan->monthly_amount * ($plan->offer->price / 100));

                    $plan->yearly_amount = $plan->yearly_amount - ($plan->yearly_amount * ($plan->offer->price / 100));
                }
            }

            $data['month'][$plan->id] = [
                'id'     => $plan->id,
                'name'   => $plan->name,
                'label'  => trans('saas_subscription::app.admin.checkout.plan-option-label-monthly', [
                    'plan'   => $plan->name,
                    'amount' => core()->formatPrice($amount, $currencySymbol),
                ]),
                'amount' => core()->formatPrice($amount, $currencySymbol),
                'total'  => core()->formatPrice($amount, $currencySymbol),
            ];

            $data['year'][$plan->id] = [
                'id'     => $plan->id,
                'name'   => $plan->name,
                'label'  => trans('saas_subscription::app.admin.checkout.plan-option-label-yearly', [
                    'plan'   => $plan->name,
                    'amount' => core()->formatPrice($plan->yearly_amount, $currencySymbol),
                ]),
                'amount' => core()->formatPrice($plan->yearly_amount * 12, $currencySymbol),
                'total'  => core()->formatPrice($plan->yearly_amount * 12, $currencySymbol),
            ];
        }

        return $data;
    }

    /**
     * Get remaining resource to create
     *
     * @param  string  $tableName
     * @param  \Webkul\SAASCustomizer\Contracts\Company  $company
     * @return void|int
     */
    public function getUsedResources($tableName, $company = null)
    {
        $company = $company ?: Company::getCurrent();

        switch ($tableName) {
            case 'orders':
                $recurringProfile = $this->getCurrentRecurringProfile($company);

                if ($recurringProfile) {
                    $lastDate = $recurringProfile->cycle_expired_on
                                ? $recurringProfile->cycle_expired_on
                                : $recurringProfile->next_due_date;

                    if (! $lastDate) {
                        $lastDate = Carbon::now();
                    }

                    return DB::table($tableName)
                        ->where('company_id', $company->id)
                        ->where('created_at', '>', $lastDate->subDays(30))
                        ->where('created_at', '<', Carbon::now())
                        ->count();
                }
            default:
                return DB::table($tableName)
                    ->where('company_id', $company->id)
                    ->count();
        }
    }

    /**
     * Get remaining resource to create
     *
     * @param  string|null  $tableName
     * @return array|void
     */
    public function getLeftResources($tableName = null)
    {
        $recurringProfile = $this->getCurrentRecurringProfile();

        if (! $recurringProfile) {
            return;
        }

        $purchasedPlan = $recurringProfile->purchased_plan;

        $purchased = $purchasedPlan->allowed_products;

        $used = $this->getUsedResources('products');

        $remaining = $purchased - $used;

        $resources = [
            'products' => [
                'purchased' => $purchased,
                'used'      => $used,
                'remaining' => $remaining,
                'allow'     => $remaining <= 0 ? false : true,
                'message'   => trans('saas_subscription::app.admin.plans.product-left-notification', [
                    'remaining' => $remaining,
                    'purchased' => $purchased,
                ]),
            ],

            'categories' => [
                'purchased' => $purchased = $purchasedPlan->allowed_categories,
                'used'      => $used = ($this->getUsedResources('categories') - 1),
                'remaining' => $remaining = $purchased - $used,
                'allow'     => $remaining <= 0 ? false : true,
                'message'   => trans('saas_subscription::app.admin.plans.category-left-notification', [
                    'remaining' => $remaining,
                    'purchased' => $purchased,
                ]),
            ],

            'attributes' => [
                'purchased' => $purchased = $purchasedPlan->allowed_attributes,
                'used'      => $used = ($this->getUsedResources('attributes') - 26),
                'remaining' => $remaining = $purchased - $used,
                'allow'     => $remaining <= 0 ? false : true,
                'message'   => trans('saas_subscription::app.admin.plans.attribute-left-notification', [
                    'remaining' => $remaining,
                    'purchased' => $purchased,
                ]),
            ],

            'attribute_families' => [
                'purchased' => $purchased = $purchasedPlan->allowed_attribute_families,
                'used'      => $used = ($this->getUsedResources('attribute_families') - 1),
                'remaining' => $remaining = $purchased - $used,
                'allow'     => $remaining <= 0 ? false : true,
                'message'   => trans('saas_subscription::app.admin.plans.attribute-family-left-notification', [
                    'remaining' => $remaining,
                    'purchased' => $purchased,
                ]),
            ],

            'channels' => [
                'purchased' => $purchased = $purchasedPlan->allowed_channels,
                'used'      => $used = ($this->getUsedResources('channels') - 1),
                'remaining' => $remaining = $purchased - $used,
                'allow'     => $remaining <= 0 ? false : true,
                'message'   => trans('saas_subscription::app.admin.plans.channel-left-notification', [
                    'remaining' => $remaining,
                    'purchased' => $purchased,
                ]),
            ],

            'orders' => [
                'purchased' => $purchased = $purchasedPlan->allowed_orders,
                'used'      => $used = $this->getUsedResources('orders'),
                'remaining' => $remaining = $purchased - $used,
                'allow'     => $remaining <= 0 ? false : true,
                'message'   => trans('saas_subscription::app.admin.plans.order-left-notification', [
                    'remaining' => $remaining,
                    'purchased' => $purchased,
                ]),
            ],
        ];

        if ($tableName) {
            return $resources[$tableName];
        }

        return $resources;
    }

    /**
     * Validate resource creation based on current plan
     *
     * @param  string  $tableName
     * @return void|bool
     */
    public function validateResource($tableName)
    {
        if (request()->route()->getName() == 'company.create.data') {
            return;
        }

        $resources = $this->getLeftResources($tableName);

        if (! $resources) {
            throw new \Webkul\SAASSubscription\Exceptions\ResourceLimitExceed(trans('saas_subscription::app.admin.layouts.purchase-plan-notification'), 403);
        }

        if (
            $tableName == 'products' 
            && request('type') == 'configurable'
        ) {
            $requestedProducts = count(array_permutation(request('super_attributes'))) + 1;

            if ($resources['remaining'] >= $requestedProducts) {
                return true;
            }
        } elseif ($resources['allow']) {
            return true;
        }

        throw new \Webkul\SAASSubscription\Exceptions\ResourceLimitExceed($resources['message'], 403);
    }

    /**
     * Validate plan for checkout
     *
     * @param  \Webkul\SAASSubscription\Contracts\Plan  $plan
     * @param  \Webkul\SAASCustomizer\Contracts\Company  $company
     * @return array
     */
    public function validateChangePlan($plan, $company = null)
    {
        $entities = [
            'products',
            'categories',
            'attributes',
            'attribute_families',
            'channels',
            'orders',
        ];

        $errors = [];

        foreach ($entities as $tableName) {
            $used = $this->getUsedResources($tableName, $company);

            if ($used > ($allowed = $plan->{'allowed_'.$tableName})) {
                $errors[] = trans('saas_subscription::app.admin.plans.resource-limit-error', [
                    'entity_name' => trans('saas_subscription::app.admin.plans.'.$tableName),
                    'allowed'     => $allowed,
                    'used'        => $used,
                ]);
            }
        }

        return $errors;
    }

    /**
     * Check Purchased Plan for current company
     *
     * @return bool
     */
    public function checkCompanyPurchasedPlan()
    {
        if (Company::getCurrent()) {
            if (! empty($this->purchasedPlanRepository->findOneByField('company_id', Company::getCurrent()?->id))) {
                return true;
            }
        }

        return false;
    }
}
