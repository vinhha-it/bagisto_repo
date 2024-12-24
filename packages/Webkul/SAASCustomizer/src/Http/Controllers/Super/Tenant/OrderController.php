<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Tenant;

use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\DataGrids\Tenant\OrderDataGrid;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        if (request()->ajax()) {
            return datagrid(OrderDataGrid::class)->process();
        }

        return view('saas::super.tenants.orders.index');
    }
}
