<?php

namespace Webkul\SAASSubscription\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class PlanHistoryDataGrid extends DataGrid
{
    /**
     * Index.
     *
     * @var string
     */
    protected $index = 'purchanse_plan_id';

    /**
     * Sort Order
     *
     * @var string
     */
    protected $sortOrder = 'desc';

    /**
     * Prepare query builder
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('saas_subscription_recurring_profiles as rp')
            ->leftJoin('saas_subscription_purchased_plans as pp', 'rp.id', '=', 'pp.saas_subscription_recurring_profile_id')
            ->select(
                'pp.id as purchanse_plan_id',
                'pp.code as plan_code',
                'pp.name as plan_name',
                'pp.created_at as purchased_date',
                'rp.reference_id',
                'rp.state',
                'rp.type as payment_type',
                'rp.period_unit',
                'rp.amount',
                'rp.next_due_date',
                'rp.id'
            )
            ->groupBy('rp.id');

        $this->addFilter('purchanse_plan_id', 'pp.id');
        $this->addFilter('plan_code', 'pp.code');
        $this->addFilter('plan_name', 'pp.name');
        $this->addFilter('reference_id', 'rp.reference_id');
        $this->addFilter('state', 'rp.state');
        $this->addFilter('payment_type', 'rp.type');
        $this->addFilter('period_unit', 'rp.period_unit');
        $this->addFilter('amount', 'rp.amount');
        $this->addFilter('purchased_date', 'pp.purchased_date');
        $this->addFilter('next_due_date', 'rp.next_due_date');

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
            'index'      => 'purchanse_plan_id',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.id'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'plan_code',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.code'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'plan_name',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'reference_id',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.reference-id'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'payment_type',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.payment-type'),
            'type'       => 'integer',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'period_unit',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.period-unit'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'amount',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.amount'),
            'type'       => 'integer',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'state',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.state'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'next_due_date',
            'label'      => trans('saas_subscription::app.admin.plans.history.datagrid.next-due-date'),
            'type'            => 'date',
            'filterable'      => false,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);
    }
}
