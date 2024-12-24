<?php

namespace Webkul\SAASCustomizer\DataGrids\Settings;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\SAASCustomizer\Repositories\Super\CurrencyRepository;

class ExchangeRateDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'currency_exchange_id';

    /**
     * Constructor for the class.
     *
     * @return void
     */
    public function __construct(protected CurrencyRepository $currencyRepository)
    {
    }

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('super_currency_exchange_rates')
            ->leftJoin('super_currencies', 'super_currency_exchange_rates.target_currency', '=', 'super_currencies.id')
            ->addSelect(
                'super_currency_exchange_rates.id as currency_exchange_id',
                'super_currencies.name as currency_name',
                'super_currency_exchange_rates.rate as currency_rate'
            );

            $this->addFilter('currency_exchange_id', 'super_currency_exchange_rates.id');
            $this->addFilter('currency_name', 'super_currencies.name');
            $this->addFilter('currency_rate', 'super_currency_exchange_rates.rate');

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
            'index'      => 'currency_exchange_id',
            'label'      => trans('saas::app.super.settings.exchange-rates.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'              => 'currency_name',
            'label'              => trans('saas::app.super.settings.exchange-rates.index.datagrid.currency-name'),
            'type'               => 'string',
            'searchable'         => true,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => $this->currencyRepository->all(['name as label', 'name as value'])->toArray(),
        ]);

        $this->addColumn([
            'index'      => 'currency_rate',
            'label'      => trans('saas::app.super.settings.exchange-rates.index.datagrid.exchange-rate'),
            'type'       => 'integer',
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
        if (companyBouncer()->hasPermission('settings.exchange_rates.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.settings.exchange-rates.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.settings.exchange_rates.edit', $row->currency_exchange_id);
                },
            ]);
        }

        if (companyBouncer()->hasPermission('settings.exchange_rates.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.exchange-rates.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.settings.exchange_rates.delete', $row->currency_exchange_id);
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
        if (companyBouncer()->hasPermission('settings.exchange_rates.mass-delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.exchange-rates.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('super.settings.exchange_rates.mass_delete'),
            ], true);
        }
    }
}
