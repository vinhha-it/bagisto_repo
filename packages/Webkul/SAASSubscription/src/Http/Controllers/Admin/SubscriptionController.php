<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Webkul\SAASCustomizer\Facades\Company;
use Webkul\SAASSubscription\Helpers\Subscription;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Repositories\PlanRepository;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     * @return void
     */
    public function __construct(
        protected PlanRepository $planRepository,
        protected Subscription $subscriptionHelper,
        protected RecurringProfileRepository $recurringProfileRepository,
    ) {
    }

    /**
     * Show the view for the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function overview()
    {
        $recurringProfile = $this->subscriptionHelper->getCurrentRecurringProfile();

        if (! $recurringProfile) {
            session()->flash('error', trans('saas_subscription::app.admin.plans.index.not-activated-plans'));

            return redirect()->route('admin.subscription.plan.index');
        }

        $paymentDetails = $this->recurringProfileRepository->where('company_id', $recurringProfile->company_id ?? Company::getCurrent()->id)->latest()->first();

        $plan = $this->planRepository->with('offer')->find($recurringProfile->saas_subscription_plan_id);
        // dd($plan->first()->toArray());

        return view('saas_subscription::admin.plans.overview', compact('recurringProfile', 'paymentDetails', 'plan'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $plans = $this->planRepository->with('offer')->all();

        return view('saas_subscription::admin.plans.index', compact('plans'));
    }

    /**
     * Function for guests user to add the product in the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
        $plan = $this->planRepository->findOrFail($id);

        $errors = $this->subscriptionHelper->validateChangePlan($plan);

        if (count($errors)) {
            session()->flash('warning', implode(' ', $errors));

            return redirect()->back();
        }

        session()->put('subscription_cart', [
            'plan'        => $plan,
            'period_unit' => 'month',
        ]);

        if (! (float) $plan->monthly_amount) {
            $this->subscriptionHelper->activateFreePlan();

            session()->flash('success', trans('saas_subscription::app.admin.plans.free-plan-activated'));

            return redirect()->route('admin.subscription.plan.overview');
        }

        return redirect()->route('admin.subscription.checkout.index');
    }
}
