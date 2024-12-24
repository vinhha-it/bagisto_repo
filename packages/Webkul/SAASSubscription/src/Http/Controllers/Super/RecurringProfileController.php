<?php

namespace Webkul\SAASSubscription\Http\Controllers\Super;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Webkul\SAASCustomizer\Facades\Company;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;
use Webkul\SAASSubscription\DataGrids\RecurringProfilesDataGrid;
use Webkul\SAASSubscription\Helpers\Paypal;
use Webkul\SAASSubscription\Helpers\Subscription;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Notifications\AssignPlanEmail;
use Webkul\SAASSubscription\Notifications\CancelPlanEmail;
use Webkul\SAASSubscription\Repositories\PlanRepository;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;

class RecurringProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \array  $_config;
     * @return void
     */
    public function __construct(
        protected CompanyRepository $companyRepository,
        protected RecurringProfileRepository $recurringProfileRepository,
        protected PlanRepository $planRepository,
        protected Subscription $subscriptionHelper,
        protected Paypal $paypalHelper,
        protected $_config = [],
    ) {
        $this->_config = request('_config');

        if (! Company::isAllowed()) {
            throw new \Exception('not_allowed_to_visit_this_section', 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(RecurringProfilesDataGrid::class)->toJson();
        }

        return view('saas_subscription::super.recurring-profiles.index');
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $recurringProfile = $this->recurringProfileRepository->findOrFail($id);

        $plan = $this->planRepository->with('offer')->find($recurringProfile->saas_subscription_plan_id);

        return view('saas_subscription::super.recurring-profiles.view', compact('recurringProfile', 'plan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign($id)
    {
        $plan = $this->planRepository->findOrFail(request('plan'));

        $company = $this->companyRepository->findOrFail($id);

        $errors = $this->subscriptionHelper->validateChangePlan($plan, $company);

        if (! count($errors)) {
            try {
                Mail::queue(new AssignPlanEmail($company, $plan));
            } catch (\Exception $e) {
            }

            if (empty($this->subscriptionHelper->activateManualPlan($company, request()->all()))) {
                return new JsonResponse([
                    'message' => 'There is no recurring profile for this tenants',
                ], 422);
            }

            return new JsonResponse([
                'message' => 'Assigned sucessfully!',
            ]);
        }

        session()->flash('warning', implode(' ', $errors));

        return redirect()->back();
    }

    /**
     * Cancel recurring profile
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $recurringProfile = $this->recurringProfileRepository->findOrFail($id);

        $plan = $this->planRepository->findOrFail($recurringProfile->saas_subscription_plan_id);

        try {
            $recurringProfile->state = 'Cancel';

            $result = $this->paypalHelper->updateRecurringProfileStatus($recurringProfile);

            if ($result['ACK']) {
                $company = $this->companyRepository->findOrFail($recurringProfile->company_id ?? Company::getCurrent());

                try {
                    Mail::queue(new CancelPlanEmail($company, $plan));
                } catch (\Exception $e) {
                }

                session()->flash('success', trans('saas_subscription::app.super.plans.plan-cancelled-message'));

                return redirect()->back();
            }

            session()->flash('error', $result['msg']);

            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', trans('saas_subscription::app.super.plans.general-error'));

            return redirect()->back();

        }
    }
}
