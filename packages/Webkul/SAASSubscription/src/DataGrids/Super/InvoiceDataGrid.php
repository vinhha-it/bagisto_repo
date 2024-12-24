<?php

namespace Webkul\SAASSubscription\DataGrids\Super;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class InvoiceDataGrid extends DataGrid
{
    /**
     * Prepare query builder
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('saas_subscription_invoices')
            ->addSelect(
                'saas_subscription_invoices.*'
            );

        $this->addFilter('id', 'id');
        $this->addFilter('customer_name', 'customer_name');
        $this->addFilter('customer_email', 'customer_email');
        $this->addFilter('cycle_expired_on', 'cycle_expired_on');
        $this->addFilter('created_at', 'created_at');

        return $queryBuilder;
    }

    /**
     * Add Columns
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('saas_subscription::app.super.invoices.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'customer_email',
            'label'      => trans('saas_subscription::app.super.invoices.index.datagrid.customer-email'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'customer_name',
            'label'      => trans('saas_subscription::app.super.invoices.index.datagrid.customer-name'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'grand_total',
            'label'      => trans('saas_subscription::app.super.invoices.index.datagrid.total'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'           => 'cycle_expired_on',
            'label'           => trans('saas_subscription::app.super.invoices.index.datagrid.expire-on'),
            'type'            => 'date',
            'filterable'      => false,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'           => 'created_at',
            'label'           => trans('saas_subscription::app.super.invoices.index.datagrid.created-at'),
            'type'            => 'date',
            'filterable'      => false,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);
    }

    /**
     * Prepare actions
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'icon'   => 'icon-view',
            'title'  => trans('saas_subscription::app.super.invoices.index.datagrid.view'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('super.subscriptions.invoices.view', $row->id);
            },
        ]);
    }
}
