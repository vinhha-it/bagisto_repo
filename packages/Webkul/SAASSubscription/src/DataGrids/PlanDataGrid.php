<?php

namespace Webkul\SAASSubscription\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class PlanDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('saas_subscription_plans')
            ->addSelect(
                'saas_subscription_plans.*'
            );

        $this->addFilter('plan_id', 'saas_subscription_plans.plan_id');
        $this->addFilter('name', 'saas_subscription_plans.name');
        $this->addFilter('code', 'saas_subscription_plans.code');

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
            'label'      => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'code',
            'label'      => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.code'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'monthly_amount',
            'label'      => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.monthly-amount'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return core()->formatPrice($row->monthly_amount, config('app.currency'));
            },
        ]);

        $this->addColumn([
            'index'      => 'yearly_amount',
            'label'      => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.yearly-amount'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return core()->formatPrice($row->yearly_amount, config('app.currency'));
            },
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.status'),
            'type'            => 'integer',
            'searchable'      => false,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options'    => [
                    [
                        'label' => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.active'),
                        'value' => '1',
                    ], [
                        'label' => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.inactive'),
                        'value' => '0',
                    ],
            ],
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<p class="label-active">'.trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.active').'</p>';
                }

                return '<p class="label-canceled">'.trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.inactive').'</p>';
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (companyBouncer()->hasPermission('super.subscriptions.plans.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.subscriptions.plans.edit', $row->id);
                },
            ]);
        }

        if (companyBouncer()->hasPermission('super.subscriptions.plans.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.subscriptions.plans.delete', $row->id);
                },
            ]);
        }
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        if (companyBouncer()->hasPermission('subscriptions.plans.mass_delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas_subscription::app.super.subscriptions.plans.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('super.subscriptions.plans.mass_delete'),
            ], true);
        }
    }
}
