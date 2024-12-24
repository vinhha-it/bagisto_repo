<?php

namespace Webkul\SAASCustomizer\DataGrids\Tenant;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class TenantDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('companies')
            ->leftJoin('company_personal_details', 'companies.id', '=', 'company_personal_details.company_id')
            ->addSelect(
                'companies.id',
                'companies.domain',
                'companies.cname',
                'companies.is_active as status',
                'companies.name as organization_name',
            )
            ->addSelect(
                DB::raw('CONCAT('.DB::getTablePrefix().'company_personal_details.first_name, " ", '.DB::getTablePrefix().'company_personal_details.last_name) as full_name')
            );
            
        $this->addFilter('id', 'companies.id');
        $this->addFilter('full_name', DB::raw('CONCAT('.DB::getTablePrefix().'company_personal_details.first_name, " ", '.DB::getTablePrefix().'company_personal_details.last_name)'));
        $this->addFilter('organization_name', 'companies.name');
        $this->addFilter('status', 'companies.is_active');

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
            'label'      => trans('saas::app.super.tenants.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'full_name',
            'label'      => trans('saas::app.super.tenants.index.datagrid.user-name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'       => 'organization_name',
            'label'       => trans('saas::app.super.tenants.index.datagrid.organization'),
            'type'        => 'string',
            'searchable'  => true,
            'sortable'    => true,
            'filterable'  => true,
        ]);

        $this->addColumn([
            'index'      => 'domain',
            'label'      => trans('saas::app.super.tenants.index.datagrid.domain'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'cname',
            'label'      => trans('saas::app.super.tenants.index.datagrid.cname'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->cname) {
                    return $row->cname;
                } else {
                    return '-';
                }
            },
        ]);

        $this->addColumn([
            'index'           => 'status',
            'label'           => trans('saas::app.super.tenants.index.datagrid.status'),
            'type'            => 'integer',
            'searchable'      => false,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label'  => trans('saas::app.super.tenants.index.datagrid.active'),
                    'value'  => '1',
                ],
                [
                    'label'  => trans('saas::app.super.tenants.customers.index.datagrid.inactive'),
                    'value'  => '0',
                ],
            ],
            'closure' => function ($row) {
                if ($row->status == 1) {
                    return '<p class="label-active">'.trans('saas::app.super.tenants.index.datagrid.active').'</p>';
                } else {
                    return '<p class="label-canceled">'.trans('saas::app.super.tenants.customers.index.datagrid.inactive').'</p>';
                }
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
        if (companyBouncer()->hasPermission('tenants.companies.view')) {
            $this->addAction([
                'index'  => 'view',
                'icon'   => 'icon-view',
                'title'  => trans('saas::app.super.tenants.index.datagrid.view'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.tenants.companies.view', $row->id);
                },
            ], true);
        }

        if (companyBouncer()->hasPermission('tenants.companies.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.tenants.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.tenants.companies.edit', $row->id);
                },
            ], true);
        }
        
        if (companyBouncer()->hasPermission('tenants.companies.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.tenants.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.tenants.companies.delete', $row->id);
                },
            ], true);
        }
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        if (companyBouncer()->hasPermission('tenants.companies.mass-edit')) {
            $this->addMassAction([
                'icon'    => 'icon-edit',
                'title'   => trans('admin::app.customers.customers.index.datagrid.update-status'),
                'method'  => 'POST',
                'url'     => route('super.tenants.companies.mass_update'),
                'options' => [
                    [
                        'label' => trans('saas::app.super.tenants.index.datagrid.active'),
                        'value' => 1,
                    ],
                    [
                        'label' => trans('saas::app.super.tenants.customers.index.datagrid.inactive'),
                        'value' => 0,
                    ],
                ],
            ]);
        }

        if (companyBouncer()->hasPermission('tenants.companies.mass-delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.tenants.index.datagrid.mass-delete'),
                'method' => 'POST',
                'url'    => route('super.tenants.companies.mass_delete'),
            ], true);
        }
    }
}
