<?php

namespace Webkul\SAASCustomizer\DataGrids\Settings;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\SAASCustomizer\Models\SuperTheme;

class ThemeDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'theme_id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $whereInLocales = company()->getRequestedLocaleCode() === 'all'
            ? company()->getAllLocales()->pluck('code')->toArray()
            : [company()->getRequestedLocaleCode()];

        $queryBuilder = DB::table('super_themes')
            ->join('super_theme_translations', function ($leftJoin) use ($whereInLocales) {
                $leftJoin->on('super_themes.id', '=', 'super_theme_translations.super_theme_id')
                    ->whereIn('super_theme_translations.locale', $whereInLocales);
            })
            ->join('super_channel_translations', function ($leftJoin) use ($whereInLocales) {
                $leftJoin->on('super_themes.channel_id', '=', 'super_channel_translations.super_channel_id')
                    ->whereIn('super_channel_translations.locale', $whereInLocales);
            })
            ->addSelect(
                'super_themes.id as theme_id',
                'super_themes.type',
                'super_themes.sort_order',
                'super_channel_translations.name as channel_name',
                'super_themes.status',
                'super_themes.name as name',
            );

        $this->addFilter('theme_id', 'super_themes.id');
        $this->addFilter('type', 'super_themes.type');
        $this->addFilter('name', 'super_themes.name');
        $this->addFilter('sort_order', 'super_themes.sort_order');
        $this->addFilter('status', 'super_themes.status');
        $this->addFilter('channel_name', 'super_channel_translations.name');

        return $queryBuilder;
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'theme_id',
            'label'      => trans('saas::app.super.settings.themes.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'           => 'channel_name',
            'label'           => trans('saas::app.super.settings.themes.index.datagrid.channel_name'),
            'type'            => 'string',
            'searchable'      => true,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => company()->getAllChannels()->first()->name,
                    'value' => company()->getAllChannels()->first()->name,
                ],
            ],
        ]);

        $this->addColumn([
            'index'           => 'type',
            'label'           => trans('saas::app.super.settings.themes.index.datagrid.type'),
            'type'            => 'string',
            'searchable'      => true,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.settings.themes.create.type.image-carousel'),
                    'value' => 'image_carousel',
                ], [
                    'label' => trans('saas::app.super.settings.themes.create.type.static-content'),
                    'value' => 'static_content',
                ], [
                    'label' => trans('saas::app.super.settings.themes.create.type.footer-links'),
                    'value' => 'footer_links',
                ], [
                    'label' => trans('saas::app.super.settings.themes.create.type.services-content'),
                    'value' => 'services_content',
                ]
            ],
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('saas::app.super.settings.themes.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'sort_order',
            'label'      => trans('saas::app.super.settings.themes.index.datagrid.sort-order'),
            'type'       => 'integer',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'              => 'status',
            'label'              => trans('saas::app.super.settings.themes.index.datagrid.status'),
            'type'               => 'integer',
            'searchable'         => true,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.tenants.index.datagrid.active'),
                    'value' => SuperTheme::STATUS_ACTIVE,
                ], [
                    'label' => trans('saas::app.super.tenants.index.datagrid.disable'),
                    'value' => SuperTheme::STATUS_INACTIVE,
                ],
            ],
            'closure'    => function ($value) {
                if ($value->status) {
                    return '<p class="label-processing">'.trans('saas::app.super.settings.themes.index.datagrid.active').'</p>';
                }

                return '<p class="label-pending">'.trans('saas::app.super.settings.themes.index.datagrid.inactive').'</p>';
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
        if (companyBouncer()->hasPermission('settings.themes.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.settings.themes.index.datagrid.view'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.settings.themes.edit', $row->theme_id);
                },
            ]);
        }

        if (companyBouncer()->hasPermission('settings.themes.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.themes.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.settings.themes.delete', $row->theme_id);
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
        if (companyBouncer()->hasPermission('settings.themes.mass-delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.themes.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('super.settings.themes.mass_delete'),
            ], true);
        }
    }
}
