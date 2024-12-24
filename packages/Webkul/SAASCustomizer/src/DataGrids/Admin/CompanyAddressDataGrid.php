<?php

namespace Webkul\SAASCustomizer\DataGrids\Admin;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Core\Repositories\CountryRepository;
use Webkul\Core\Repositories\CountryStateRepository;

class CompanyAddressDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'address_id';

    /**
     * Constructor for the class.
     *
     * @return void
     */
    public function __construct(
        protected CountryStateRepository $countryStateRepository,
        protected CountryRepository $countryRepository,
    ) {
    }

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('company_addresses')
            ->select(
                'company_addresses.id as address_id',
                'company_addresses.*',
                DB::raw(''.DB::getTablePrefix().'countries.name as country_name'),
            )
            ->leftJoin('countries', 'company_addresses.country', '=', 'countries.code');

        $this->addFilter('address_id', 'company_addresses.id');
        $this->addFilter('address1', 'company_addresses.address1');
        $this->addFilter('address2', 'company_addresses.address2');
        $this->addFilter('city', 'company_addresses.city');
        $this->addFilter('state', 'company_addresses.state');
        $this->addFilter('country_name', DB::raw(DB::getTablePrefix().'countries.name'));
        $this->addFilter('postcode', 'company_addresses.zip_code');
        $this->addFilter('phone', 'company_addresses.phone');

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
            'index'      => 'address_id',
            'label'      => trans('saas::app.admin.tenant-address.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'address1',
            'label'      => trans('saas::app.admin.tenant-address.index.datagrid.address1'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'address2',
            'label'      => trans('saas::app.admin.tenant-address.index.datagrid.address2'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'city',
            'label'      => trans('saas::app.admin.tenant-address.index.datagrid.city'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'              => 'state',
            'label'              => trans('saas::app.admin.tenant-address.index.datagrid.state'),
            'type'               => 'string',
            'searchable'         => true,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => $this->countryStateRepository->all(['default_name as label', 'default_name as value'])->toArray(),
        ]);

        $this->addColumn([
            'index'              => 'country_name',
            'label'              => trans('saas::app.admin.tenant-address.index.datagrid.country'),
            'type'               => 'string',
            'searchable'         => true,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => $this->countryRepository->all(['name as label', 'name as value'])->toArray(),
        ]);

        $this->addColumn([
            'index'      => 'zip_code',
            'label'      => trans('saas::app.admin.tenant-address.index.datagrid.postcode'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'phone',
            'label'      => trans('saas::app.admin.tenant-address.index.datagrid.phone'),
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
        $this->addAction([
            'icon'   => 'icon-edit',
            'title'  => trans('saas::app.admin.tenant-address.index.datagrid.edit'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('admin.company.address.edit', $row->address_id);
            },
        ], true);

        $this->addAction([
            'icon'   => 'icon-delete',
            'title'  => trans('saas::app.admin.tenant-address.index.datagrid.delete'),
            'method' => 'DELETE',
            'url'    => function ($row) {
                return route('admin.company.address.delete', $row->address_id);
            },
        ], true);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        $this->addMassAction([
            'title'  => trans('saas::app.admin.tenant-address.index.datagrid.mass-delete'),
            'url'    => route('admin.company.address.mass_delete'),
            'method' => 'POST',
        ]);
    }
}
