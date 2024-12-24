<?php

namespace Webkul\SAASSubscription\Helpers;

use Illuminate\Support\Arr;
use Webkul\SAASSubscription\Repositories\AddressRepository;
use Webkul\SAASSubscription\Repositories\InvoiceRepository;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;

class Paypal
{
    /**
     * Create a new helper instance.
     *
     * @return void
     */
    public function __construct(
        protected RecurringProfileRepository $recurringProfileRepository,
        protected InvoiceRepository $invoiceRepository,
        protected AddressRepository $addressRepository,
        protected Subscription $subscriptionHelper
    ) {
    }

    /**
     * @param  \Webkul\SAASSubscription\Contracts\PurchasedPlan  $plan
     * @return array
     */
    public function validateRecurringProfile($plan)
    {
        $errors = [];

        if (strlen($plan->name) > 32) {
            $errors[] = trans('saas_subscription::app.super.plans.name-too-long-error');
        }

        if (strlen($plan->description) > 127) {
            $errors[] = trans('saas_subscription::app.super.plans.description-too-long-error');
        }

        return $errors;
    }

    /**
     * @param  string  $transactionId
     * @return string
     */
    public function getTransactionLink($transactionId)
    {
        $paypalmode = company()->getSuperConfigData('subscription.payment.paypal.sandbox_mode')
                    ? 'sandbox.'
                    : '';

        return 'https://'.$paypalmode.'paypal.com/cgi-bin/webscr?cmd=_view-a-trans&id='.$transactionId;
    }

    /**
     * Returns recurring profile details
     *
     * @param  \Webkul\SAASSubscription\Contracts\RecurringProfile  $recurringProfile
     * @return array
     */
    public function getRecurringProfileDetails($recurringProfile)
    {
        $nvps = '&USER='.company()->getSuperConfigData('subscription.payment.paypal.user_name')
                .'&PWD='.company()->getSuperConfigData('subscription.payment.paypal.password')
                .'&SIGNATURE='.company()->getSuperConfigData('subscription.payment.paypal.signature')
                .'&METHOD=GetRecurringPaymentsProfileDetails'
                .'&PROFILEID='.$recurringProfile->reference_id
                .'&VERSION=108.0';

        $getEC = $this->request($nvps);

        if ($getEC['ACK'] == 'Success') {
            $this->recurringProfileRepository->update([
                'state' => $this->getProfileState($getEC['STATUS']),
            ], $recurringProfile->id);

            return ['ACK' => 1];
        } else {
            return [
                'ACK' => 0,
                'msg' => 'Error - '.$getEC['L_ERRORCODE0'].' : '.$getEC['L_LONGMESSAGE0'],
            ];
        }
    }

    /**
     * Manage recurring profile status
     *
     * @param  \Webkul\SAASSubscription\Contracts\RecurringProfile  $recurringProfile
     * @return array
     */
    public function updateRecurringProfileStatus($recurringProfile)
    {
        $nvps = '&USER='.company()->getSuperConfigData('subscription.payment.paypal.user_name')
                .'&PWD='.company()->getSuperConfigData('subscription.payment.paypal.password')
                .'&SIGNATURE='.company()->getSuperConfigData('subscription.payment.paypal.signature')
                .'&METHOD=ManageRecurringPaymentsProfileStatus'
                .'&PROFILEID='.$recurringProfile->reference_id
                .'&VERSION=108.0'
                .'&ACTION='.$recurringProfile->state;

        $getEC = $this->request($nvps);

        if ($getEC['ACK'] == 'Success') {
            $this->recurringProfileRepository->update([
                'state' => $this->getProfileState($recurringProfile->state),
            ], $recurringProfile->id);

            return ['ACK' => 1];
        } else {
            return [
                'ACK' => 0,
                'msg' => 'Error - '.$getEC['L_ERRORCODE0'].' : '.$getEC['L_LONGMESSAGE0'],
            ];
        }
    }

    /**
     * Bill profile outstanding balance
     *
     * @param  \Webkul\SAASSubscription\Contracts\RecurringProfile  $recurringProfile
     * @return array
     */
    public function billOutstandingBalance($recurringProfile)
    {
        $nvps = '&USER='.company()->getSuperConfigData('subscription.payment.paypal.user_name')
                .'&PWD='.company()->getSuperConfigData('subscription.payment.paypal.password')
                .'&SIGNATURE='.company()->getSuperConfigData('subscription.payment.paypal.signature')
                .'&METHOD=BillOutstandingAmount'
                .'&PROFILEID='.$recurringProfile->reference_id
                .'&VERSION=108.0';

        $getEC = $this->request($nvps);

        if ($getEC['ACK'] == 'Success') {
            $plan = $this->recurringProfileRepository->findOneByField(
                'sku', $recurringProfile->purchased_plan->sku
            );

            $nextDueDate = $this->subscriptionHelper->getNextDueDate($recurringProfile);

            if (
                $recurringProfile->payment_status != 'Skipped'
                && $recurringProfile->payment_status != 'Pending'
            ) {
                $invoice = $this->invoiceRepository->create([
                    'saas_subscription_purchased_plan_id'    => $recurringProfile->purchased_plan->id,
                    'saas_subscription_recurring_profile_id' => $recurringProfile->id,
                    'grand_total'                            => $recurringProfile->amount,
                    'cycle_expired_on'                       => $nextDueDate,
                    'customer_email'                         => $recurringProfile->company->email,
                    'customer_name'                          => $recurringProfile->company->username,
                    'payment_method'                         => 'Paypal',
                    'payment_status'                         => 'Success',
                ]);

                if ($billingAddress = $recurringProfile->billing_address) {
                    $addressData = Arr::except($billingAddress->toArray(), [
                        'saas_subscription_recurring_profile_id',
                    ]);

                    $this->addressRepository->create(
                        array_merge($addressData, ['saas_subscription_invoice_id' => $invoice->id])
                    );
                }
            } else {
                $this->invoiceRepository->update([
                    'cycle_expired_on' => $nextDueDate,
                    'payment_method'   => 'Paypal',
                    'payment_status'   => 'Success',
                ], $recurringProfile->saas_subscription_invoice_id);
            }

            $this->recurringProfileRepository->update([
                'next_due_date'                => $nextDueDate,
                'cycle_expired_on'             => $nextDueDate,
                'payment_status'               => 'Success',
                'saas_subscription_invoice_id' => isset($invoice)
                                                  ? $invoice->id
                                                  : $recurringProfile->saas_subscription_invoice_id,
            ], $recurringProfile->id);

            return ['ACK' => 1];
        } else {
            return [
                'ACK' => 0,
                'msg' => 'Error - '.$getEC['L_ERRORCODE0'].' : '.$getEC['L_LONGMESSAGE0'],
            ];
        }
    }

    /**
     * Set 0.00 to profile outstanding balance
     *
     * @param  \Webkul\SAASSubscription\Contracts\RecurringProfile  $recurringProfile
     * @return array
     */
    public function clearOutstandingBalance($recurringProfile)
    {
        $nvps = '&USER='.company()->getSuperConfigData('subscription.payment.paypal.user_name')
                .'&PWD='.company()->getSuperConfigData('subscription.payment.paypal.password')
                .'&SIGNATURE='.company()->getSuperConfigData('subscription.payment.paypal.signature')
                .'&METHOD=UpdateRecurringPaymentsProfile'
                .'&PROFILEID='.$recurringProfile->reference_id
                .'&OUTSTANDINGAMT=0'
                .'&VERSION=108.0';

        $getEC = $this->request($nvps);

        if ($getEC['ACK'] == 'Success') {
            return ['ACK' => 1];
        } else {
            return [
                'ACK' => 0,
                'msg' => 'Error - '.$getEC['L_ERRORCODE0'].' : '.$getEC['L_LONGMESSAGE0'],
            ];
        }
    }

    /**
     * Returns recurring profile state
     *
     * @param  string  $state
     * @return string|void
     */
    public function getProfileState($state)
    {
        switch ($state) {
            case 'ActiveProfile':
            case 'Active':
            case 'Reactivate':
                return 'Active';

            case 'PendingProfile':
                return 'Pending';

            case 'CancelledProfile':
            case 'Cancelled':
            case 'Cancel':
                return 'Cancelled';

            case 'SuspendedProfile':
            case 'Suspended':
            case 'Suspend':
                return 'Suspended';

            case 'ExpiredProfile':
            case 'Expired':
                return 'Expired';
            default:
                return;
        }
    }

    /**
     * Request This function make curl request to paypal
     *
     * @param  string  $nvp
     * @return array
     */
    public function request($nvp)
    {
        $paypalmode = company()->getSuperConfigData('subscription.payment.paypal.sandbox_mode')
                      ? '.sandbox'
                      : '';

        $url = 'https://api-3t'.$paypalmode.'.paypal.com/nvp';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 45);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvp);

        $result = curl_exec($ch);

        $httpResponse = explode('&', $result);

        $httpParsedResponse = [];

        foreach ($httpResponse as $value) {
            $tmp = explode('=', $value);

            if (count($tmp) > 1) {
                $httpParsedResponse[$tmp[0]] = urldecode($tmp[1]);
            }
        }

        curl_close($ch);

        return $httpParsedResponse;
    }
}
