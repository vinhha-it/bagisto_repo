<?php

namespace Webkul\SAASSubscription\Http\Controllers\Super;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;
use Webkul\SAASSubscription\DataGrids\PlanDataGrid;
use Webkul\SAASSubscription\Notifications\PlanChangedEmail;
use Webkul\SAASSubscription\Repositories\OffersRepository;
use Webkul\SAASSubscription\Repositories\PlanRepository;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;
use Webkul\SAASSubscription\Requests\PlanRequest;

class PlanController extends Controller
{
    public const FIXED = 'fixed';

    public const DISCOUNT = 'discount';

    public const ACTIVE = 'active';

    public const INACTIVE = 'inactive';

    /**
     * Create a new controller instance.
     *
     *
     * @return void
     */
    public function __construct(
        protected CompanyRepository $companyRepository,
        protected PlanRepository $planRepository,
        protected RecurringProfileRepository $recurringProfileRepository,
        protected OffersRepository $offersRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(PlanDataGrid::class)->process();
        }

        return view('saas_subscription::super.subscriptions.plans.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('saas_subscription::super.subscriptions.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $planRequest)
    {
        if (request()->has('modules')) {
            $planRequest->modulesMerge();
        }

        Event::dispatch('super.subscriptions.plans.create.before');

        $plan = $this->planRepository->create($planRequest->all());

        $planRequest->merge([
            'plan_id'      => $plan->id,
            'offer_status' => $planRequest->input('offer_status'),
        ]);

        $this->offersRepository->create($planRequest->all());

        Event::dispatch('super.subscriptions.plans.create.after', $plan);

        session()->flash('success', trans('saas_subscription::app.super.plans.create-success'));

        return redirect()->route('super.subscriptions.plans.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $plan = $this->planRepository->with('offer')->findOrFail($id);

        $dropdownOptions = [
            'types'        => [self::FIXED, self::DISCOUNT],
            'offer_status' => [self::ACTIVE => 1, self::INACTIVE => 0],
        ];

        return view('saas_subscription::super.subscriptions.plans.edit', compact('plan', 'dropdownOptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $planRequest, $id)
    {
        if (request()->has('modules')) {
            $planRequest->modulesMerge();
        }

        Event::dispatch('super.subscriptions.plans.update.before', $id);

        $recurringProfiles = $this->recurringProfileRepository->findWhere(['saas_subscription_plan_id' => $id]);

        $plan = $this->planRepository->update($planRequest->all(), $id);

        $planRequest->merge([
            'plan_id'      => $plan->id,
            'offer_status' => $planRequest->input('offer_status'),
        ]);

        $this->offersRepository->update($planRequest->all(), $planRequest->offer_id);

        foreach ($recurringProfiles as $profile) {
            if (! $profile->company_id) {
                continue;
            }

            try {
                $company = $this->companyRepository->find($profile->company_id);

                Mail::queue(new PlanChangedEmail($company, $plan));
            } catch (\Exception $e) {
            }
        }

        Event::dispatch('super.subscriptions.plans.update.after', $plan);

        session()->flash('success', trans('saas_subscription::app.super.plans.update-success'));

        return redirect()->route('super.subscriptions.plans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->planRepository->findOrFail($id);

        try {
            Event::dispatch('super.subscription.plan.delete.before', $id);

            $this->planRepository->delete($id);

            Event::dispatch('super.subscription.plan.delete.after', $id);

            return response()->json(['message' => __('saas_subscription::app.super.plans.delete-success')], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('admin::app.response.delete-failed')], 400);
        }
    }

    /**
     * Mass delete the customer's addresses.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $planIds = $massDestroyRequest->input('indices');

        try {
            foreach ($planIds as $planId) {
                Event::dispatch('super.subscription.plan.delete.before', $planId);
    
                $this->planRepository->delete($planId);
    
                Event::dispatch('super.subscription.plan.delete.after', $planId);
            }
    
            return new JsonResponse([
                'message' => trans('saas_subscription::app.super.plans.delete-success'),
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 500);
        }

       
    }
}
