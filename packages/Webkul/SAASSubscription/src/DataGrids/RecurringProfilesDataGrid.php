<?php

namespace Webkul\SAASSubscription\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class RecurringProfilesDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('saas_subscription_recurring_profiles')
            ->addSelect(
                'saas_subscription_recurring_profiles.*',
                'companies.name'
            )
            ->leftJoin('companies', 'saas_subscription_recurring_profiles.company_id', '=', 'companies.id');

        $this->addFilter('id', 'saas_subscription_recurring_profiles.id');
        $this->addFilter('name', 'companies.name');
        $this->addFilter('schedule_description', 'saas_subscription_recurring_profiles.schedule_description');
        $this->addFilter('amount', 'saas_subscription_recurring_profiles.amount');
        $this->addFilter('period_unit', 'saas_subscription_recurring_profiles.period_unit');
        $this->addFilter('state', 'saas_subscription_recurring_profiles.state');
        $this->addFilter('created_at', 'saas_subscription_recurring_profiles.created_at');

        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.company-name'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'schedule_description',
            'label'      => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.plan-name'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->type != 'trial') {
                    return $row->schedule_description;
                }

                return $row->schedule_description.' - Trial';
            },
        ]);

        $this->addColumn([
            'index'      => 'amount',
            'label'      => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.amount'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'period_unit',
            'label'      => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.period-unit'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'state',
            'label'      => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.profile-state'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.created-at'),
            'type'            => 'date',
            'filterable'      => false,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'icon'   => 'icon-view',
            'title'  => trans('saas_subscription::app.super.recurring-profiles.index.datagrid.view'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('super.subscriptions.recurring_profiles.view', $row->id);
            },
        ]);
    }
}
