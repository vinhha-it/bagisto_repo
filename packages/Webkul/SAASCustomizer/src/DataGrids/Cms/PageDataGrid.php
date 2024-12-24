<?php

namespace Webkul\SAASCustomizer\DataGrids\Cms;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class PageDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('super_cms_pages')
            ->select(
                'super_cms_pages.id',
                'super_cms_page_translations.page_title',
                'super_cms_page_translations.url_key'
                )
            ->leftJoin('super_cms_page_translations', function($leftJoin) {
                $leftJoin->on('super_cms_pages.id', '=', 'super_cms_page_translations.super_cms_page_id')
                ->where('super_cms_page_translations.locale', app()->getLocale());
            });

        $this->addFilter('id', 'super_cms_pages.id');
        $this->addFilter('page_title', 'super_cms_page_translations.page_title');
        $this->addFilter('url_key', 'super_cms_page_translations.url_key');

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
            'label'      => trans('saas::app.super.cms.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'page_title',
            'label'      => trans('saas::app.super.cms.index.datagrid.page-title'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'url_key',
            'label'      => trans('saas::app.super.cms.index.datagrid.url-key'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
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
        if (companyBouncer()->hasPermission('cms.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.cms.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.cms.edit', $row->id);
                },
            ]);
        }

        if (companyBouncer()->hasPermission('cms.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.cms.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.cms.delete', $row->id);
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
        if (companyBouncer()->hasPermission('cms.mass_delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.cms.index.datagrid.mass-delete'),
                'method' => 'POST',
                'url'    => route('super.cms.mass_delete'),
            ]);
        }
    }
}
