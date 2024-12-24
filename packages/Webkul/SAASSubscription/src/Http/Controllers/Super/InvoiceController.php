<?php

namespace Webkul\SAASSubscription\Http\Controllers\Super;

use Webkul\SAASCustomizer\Facades\Company;
use Webkul\SAASSubscription\DataGrids\Super\InvoiceDataGrid;
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
        protected $_config = null,
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
            return datagrid(InvoiceDataGrid::class)->process();
        }

        return view('saas_subscription::super.invoices.index');
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

        return view('saas_subscription::super.invoices.view', compact('invoice', 'paymentDetails'));
    }
}
