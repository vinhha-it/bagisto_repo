<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Webkul\SAASCustomizer\Facades\Company;
use Webkul\SAASSubscription\DataGrids\InvoiceDataGrid;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Repositories\InvoiceRepository;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  array|null  $_config
     * @return void
     */
    public function __construct(
        protected InvoiceRepository $invoiceRepository,
        protected RecurringProfileRepository $recurringProfileRepository,

    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $invoices = $this->invoiceRepository->findByField([
        //     'company_id' => Company::getCurrent()->id,
        // ]);

        if (request()->ajax()) {
            return datagrid(InvoiceDataGrid::class)->process();
        }

        return view('saas_subscription::admin.invoices.index');
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $invoice = $this->invoiceRepository->findOrFail($id);

        $paymentDetails = $this->recurringProfileRepository->findOneWhere(['company_id' => $invoice->company_id ?? Company::getCurrent()->id]);

        return view('saas_subscription::admin.invoices.view', compact('invoice', 'paymentDetails'));
    }
}
