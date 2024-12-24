<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Tenant;

use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\DataGrids\Tenant\CustomerDataGrid;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        if (request()->ajax()) {
            return datagrid(CustomerDataGrid::class)->process();
        }

        return view('saas::super.tenants.customers.index');
    }
}
