<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Carbon\Carbon;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;
use Webkul\SAASSubscription\Helpers\Subscription as SubscriptionHelper;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Repositories\PlanRepository;
use Webkul\SAASSubscription\Requests\PlanPurchaseRequest;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected PlanRepository $planRepository,
        protected SubscriptionHelper $subscriptionHelper,
        protected CompanyRepository $companyRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $plans = $this->planRepository->all();

        $isTrailAllowed = $this->subscriptionHelper->checkCompanyPurchasedPlan();

        return view('saas_subscription::admin.checkout.index', compact('plans', 'isTrailAllowed'));
    }

    /**
     * Proceed to purchase selected plan
     *
     * @return \Illuminate\Http\Response
     */
    //PlanPurchaseRequest $planPurchaseRequest
    public function purchase(PlanPurchaseRequest $planPurchaseRequest)
    {
        $data = $planPurchaseRequest->all();

        $currentTime = Carbon::now();

        if ($data['period_unit'] == 'month') {
            $nextDueDate = $currentTime->addMonth();
        } else {
            $nextDueDate = $currentTime->addYear();
        }

        $plan = $this->planRepository->findOrFail(request('plan'));

        if ($plan->offer->offer_status) {
            if ($plan->offer->type == 'fixed') {
                $plan->monthly_amount = $plan->monthly_amount - $plan->offer->price;

                $plan->yearly_amount = $plan->yearly_amount - $plan->offer->price;
            } else {
                $plan->monthly_amount = $plan->monthly_amount - ($plan->monthly_amount * ($plan->offer->price / 100));

                $plan->yearly_amount = $plan->yearly_amount - ($plan->yearly_amount * ($plan->offer->price / 100));
            }
        }

        $allowTrail = $this->subscriptionHelper->checkCompanyPurchasedPlan();

        $trialPlan = company()->getSuperConfigData('subscription.payment.general.allow_trial');

        $company = $this->companyRepository->findOrFail(company()->getCurrent()->id);

        if (
            ! empty($data['allow_trail'])
            && $allowTrail
            && $trialPlan == request('plan')
        ) {
            if ($this->subscriptionHelper->activateTrial()) {
                session()->flash('success', trans('saas_subscription::app.admin.checkout.success-activated-plan', ['plan_name' => $plan->name]));
            }

            return redirect()->route('admin.subscription.plan.index');
        } else {

            $data = array_merge($data, [
                'plan'             => $plan,
                'type'             => 'paypal',
                'company'          => $company,
                'cycle_expired_on' => $nextDueDate,
                'amount'           => $data['period_unit'] == 'month' ? $plan->monthly_amount : $plan->yearly_amount * 12,
            ]);

            session()->put('subscription_cart', $data);

            return redirect()->route('admin.subscription.paypal.start');
        }
    }
}
