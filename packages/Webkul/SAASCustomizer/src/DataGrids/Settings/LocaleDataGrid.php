<?php

namespace Webkul\SAASCustomizer\DataGrids\Settings;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\SAASCustomizer\Models\Locale;

class LocaleDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('super_locales')
            ->addSelect(
                'super_locales.id',
                'super_locales.code',
                'super_locales.name',
                'super_locales.direction'
            );

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
            'label'      => trans('saas::app.super.settings.locales.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'code',
            'label'      => trans('saas::app.super.settings.locales.index.datagrid.code'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('saas::app.super.settings.locales.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'           => 'direction',
            'label'           => trans('saas::app.super.settings.locales.index.datagrid.direction'),
            'type'            => 'string',
            'searchable'      => true,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.settings.locales.index.datagrid.text-ltr'),
                    'value' => Locale::DIRECTION_LTR,
                ],
                [
                    'label' => trans('saas::app.super.settings.locales.index.datagrid.text-rtl'),
                    'value' => Locale::DIRECTION_RTL,
                ],
            ],
            'closure' => function ($row) {
                if ($row->direction == Locale::DIRECTION_LTR) {
                    return trans('saas::app.super.settings.locales.index.datagrid.text-ltr');
                }

                return trans('saas::app.super.settings.locales.index.datagrid.text-rtl');
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
        if (companyBouncer()->hasPermission('settings.locales.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.settings.locales.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.settings.locales.edit', $row->id);
                },
            ]);
        }

        if (companyBouncer()->hasPermission('settings.locales.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.locales.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.settings.locales.delete', $row->id);
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
        if (companyBouncer()->hasPermission('settings.locales.mass-delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.locales.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('super.settings.locales.mass_delete'),
            ], true);
        }
    }
}
