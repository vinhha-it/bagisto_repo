<?php

namespace Webkul\SAASCustomizer\DataGrids\Settings;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\SAASCustomizer\Models\SuperRoles;

class RoleDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'role_id';

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('super_roles')
            ->addSelect(
                'super_roles.id as role_id',
                'super_roles.name',
                'super_roles.permission_type'
            );

        $this->addFilter('role_id', 'super_roles.id');
        $this->addFilter('permission_type', 'super_roles.permission_type');
        $this->addFilter('role_name', 'super_roles.name');

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
            'index'      => 'role_id',
            'label'      => trans('saas::app.super.settings.roles.index.datagrid.id'),
            'type'       => 'integer',
            'width'      => '40px',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('saas::app.super.settings.roles.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'           => 'permission_type',
            'label'           => trans('saas::app.super.settings.roles.index.datagrid.permission-type'),
            'type'            => 'string',
            'searchable'      => true,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.settings.roles.create.all'),
                    'value' => SuperRoles::PERMISSION_ALL,
                ],
                [
                    'label' => trans('saas::app.super.settings.roles.create.custom'),
                    'value' => SuperRoles::PERMISSION_CUSTOM,
                ],
            ],
            'closure' => function ($row) {
                if ($row->permission_type == SuperRoles::PERMISSION_ALL) {
                    return trans('saas::app.super.settings.roles.create.all');
                }

                return trans('saas::app.super.settings.roles.create.custom');
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
        if (companyBouncer()->hasPermission('settings.roles.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.settings.roles.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.settings.roles.edit', $row->role_id);
                },
            ]);
        }

        if (companyBouncer()->hasPermission('settings.roles.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.roles.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.settings.roles.delete', $row->role_id);
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
        if (companyBouncer()->hasPermission('settings.roles.mass-delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.roles.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('super.settings.roles.mass_delete'),
            ], true);
        }
    }
}
