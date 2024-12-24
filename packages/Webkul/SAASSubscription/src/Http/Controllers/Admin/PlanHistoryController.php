<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Webkul\SAASSubscription\DataGrids\PlanHistoryDataGrid;
use Webkul\SAASSubscription\Http\Controllers\Controller;

class PlanHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(PlanHistoryDataGrid::class)->toJson();
        }

        return view('saas_subscription::admin.plans.history');
    }
}
