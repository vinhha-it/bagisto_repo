<?php

namespace Webkul\SAASCustomizer\DataGrids\Tenant;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\SAASCustomizer\Models\Customer\Customer;

class CustomerDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'customer_id';

    /**
     * Constructor for the class.
     *
     * @return void
     */
    public function __construct(protected CustomerRepository $customerRepository)
    {
    }

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('customers')
            ->leftJoin('customer_groups', 'customers.customer_group_id', '=', 'customer_groups.id')
            ->leftJoin('companies', 'customers.company_id', '=', 'companies.id')
            ->addSelect(
                'customers.id as customer_id',
                'customers.email as customer_email',
                'customer_groups.id as customer_group_id',
                'customer_groups.name as customer_group_name',
                'customers.phone',
                'companies.name as company_name',
                'companies.domain',
                'status',
                'is_suspended'
                )
            ->addSelect(DB::raw('CONCAT('.DB::getTablePrefix().'customers.first_name, " ", '.DB::getTablePrefix().'customers.last_name) as full_name'));

        $this->addFilter('customer_id', 'customers.id');
        $this->addFilter('full_name', DB::raw('CONCAT('.DB::getTablePrefix().'customers.first_name, " ", '.DB::getTablePrefix().'customers.last_name)'));
        $this->addFilter('customer_email', 'customers.email');
        $this->addFilter('phone', 'customers.phone');
        $this->addFilter('company_name', 'companies.name');
        $this->addFilter('customer_group_id', 'customer_groups.id');
        $this->addFilter('domain', 'companies.domain');

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
            'index'      => 'customer_id',
            'label'      => trans('saas::app.super.tenants.customers.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'domain',
            'label'      => trans('saas::app.super.tenants.customers.index.datagrid.domain'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'full_name',
            'label'      => trans('saas::app.super.tenants.customers.index.datagrid.customer-name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'              => 'customer_email',
            'label'              => trans('saas::app.super.tenants.customers.index.datagrid.email'),
            'type'               => 'string',
            'searchable'         => true,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => $this->customerRepository->all(['email as label', 'email as value'])->toArray(),
        ]);

        $this->addColumn([
            'index'              => 'customer_group_id',
            'label'              => trans('saas::app.super.tenants.customers.index.datagrid.customer-group'),
            'type'               => 'string',
            'searchable'         => false,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => company()->getAllCustomerGroups(),
            'closure'            => function ($row) {
                return $row->customer_group_name;
            },
        ]);

        $this->addColumn([
            'index'      => 'phone',
            'label'      => trans('saas::app.super.tenants.customers.index.datagrid.phone'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => false,
            'filterable' => false,
            'closure'    => function ($row) {
                return $row->phone ?: '-';
            },
        ]);

        $this->addColumn([
            'index'           => 'is_suspended',
            'label'           => trans('saas::app.super.tenants.customers.index.datagrid.is-suspended'),
            'type'            => 'integer',
            'searchable'      => false,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.tenants.customers.index.datagrid.is-suspended'),
                    'value' => Customer::SUSPENDED_YES,
                ],
                [
                    'label' => trans('saas::app.super.tenants.customers.index.datagrid.active'),
                    'value' => Customer::SUSPENDED_NO,
                ],
            ],
            'closure' => function ($row) {
                if ($row->is_suspended) {
                    return '<p class="label-canceled">'.trans('saas::app.super.tenants.customers.index.datagrid.is-suspended').'</p>';
                }

                return '-';
            },
        ]);

        $this->addColumn([
            'index'           => 'status',
            'label'           => trans('saas::app.super.tenants.customers.index.datagrid.status'),
            'type'            => 'string',
            'searchable'      => false,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.tenants.customers.index.datagrid.active'),
                    'value' => Customer::STATUS_ACTIVE,
                ],
                [
                    'label' => trans('saas::app.super.tenants.customers.index.datagrid.inactive'),
                    'value' => Customer::STATUS_INACTIVE,
                ],
            ],
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<p class="label-active">'.trans('saas::app.super.tenants.customers.index.datagrid.active').'</p>';
                }
                
                return '<p class="label-canceled">'.trans('saas::app.super.tenants.customers.index.datagrid.inactive').'</p>';
            },
        ]);
    }
}
