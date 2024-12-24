<?php

namespace Webkul\SAASCustomizer\DataGrids\Settings;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class ChannelDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('super_channels')
            ->leftJoin('super_channel_translations', function ($leftJoin) {
                $leftJoin->on('super_channel_translations.super_channel_id', '=', 'super_channels.id')
                    ->where('super_channel_translations.locale', core()->getRequestedLocaleCode());
            })
            ->addSelect(
                'super_channels.id',
                'super_channels.code',
                'super_channel_translations.locale',
                'super_channel_translations.name as translated_name',
                'super_channels.hostname'
            );

        $this->addFilter('id', 'super_channels.id');
        $this->addFilter('code', 'super_channels.code');
        $this->addFilter('hostname', 'super_channels.hostname');
        $this->addFilter('translated_name', 'super_channel_translations.name');

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
            'label'      => trans('saas::app.super.settings.channels.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'code',
            'label'      => trans('saas::app.super.settings.channels.index.datagrid.code'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'translated_name',
            'label'      => trans('saas::app.super.settings.channels.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'hostname',
            'label'      => trans('saas::app.super.settings.channels.index.datagrid.hostname'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (companyBouncer()->hasPermission('settings.channels.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.settings.channels.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.settings.channels.edit', $row->id);
                },
            ]);
        }
    }
}
