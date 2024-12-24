<?php

namespace Webkul\SAASCustomizer\DataGrids\Tenant;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Sales\Models\OrderAddress;
use Webkul\Sales\Repositories\OrderRepository;

class OrderDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'increment_id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('orders')
            ->leftJoin('addresses as order_address_shipping', function ($leftJoin) {
                $leftJoin->on('order_address_shipping.order_id', '=', 'orders.id')
                    ->where('order_address_shipping.address_type', OrderAddress::ADDRESS_TYPE_SHIPPING);
            })
            ->leftJoin('addresses as order_address_billing', function ($leftJoin) {
                $leftJoin->on('order_address_billing.order_id', '=', 'orders.id')
                    ->where('order_address_billing.address_type', OrderAddress::ADDRESS_TYPE_BILLING);
            })
            ->leftJoin('order_payment', 'orders.id', '=', 'order_payment.order_id')
            ->leftJoin('companies', 'orders.company_id', '=', 'companies.id')
            ->select(
                'orders.id',
                'order_payment.method',
                'orders.increment_id',
                'orders.base_grand_total',
                'orders.created_at',
                'channel_name',
                'status',
                'customer_email',
                'orders.cart_id as image',
                'companies.name as company_name',
                'companies.domain',
                DB::raw('CONCAT('.DB::getTablePrefix().'orders.customer_first_name, " ", '.DB::getTablePrefix().'orders.customer_last_name) as full_name'),
                DB::raw('CONCAT('.DB::getTablePrefix().'order_address_billing.city, ", ", '.DB::getTablePrefix().'order_address_billing.state,", ", '.DB::getTablePrefix().'order_address_billing.country) as location')
            );

        $this->addFilter('full_name', DB::raw('CONCAT('.DB::getTablePrefix().'orders.customer_first_name, " ", '.DB::getTablePrefix().'orders.customer_last_name)'));
        $this->addFilter('created_at', 'orders.created_at');
        $this->addFilter('company_name', 'companies.name');
        $this->addFilter('domain', 'companies.domain');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'increment_id',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.order-id'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'domain',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.domain'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'           => 'status',
            'label'           => trans('saas::app.super.tenants.orders.index.datagrid.status'),
            'type'            => 'string',
            'searchable'      => true,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'checkbox',
            'filterable_options' => [
                'processing'      => trans('saas::app.super.tenants.orders.index.datagrid.processing'),
                'completed'       => trans('saas::app.super.tenants.orders.index.datagrid.completed'),
                'canceled'        => trans('saas::app.super.tenants.orders.index.datagrid.canceled'),
                'closed'          => trans('saas::app.super.tenants.orders.index.datagrid.closed'),
                'pending'         => trans('saas::app.super.tenants.orders.index.datagrid.pending'),
                'pending_payment' => trans('saas::app.super.tenants.orders.index.datagrid.pending-payment'),
                'fraud'           => trans('saas::app.super.tenants.orders.index.datagrid.fraud'),
            ],
            'closure'    => function ($row) {
                switch ($row->status) {
                    case 'processing':
                        return '<p class="label-processing">'.trans('saas::app.super.tenants.orders.index.datagrid.processing').'</p>';

                    case 'completed':
                        return '<p class="label-active">'.trans('saas::app.super.tenants.orders.index.datagrid.completed').'</p>';

                    case 'canceled':
                        return '<p class="label-canceled">'.trans('saas::app.super.tenants.orders.index.datagrid.canceled').'</p>';

                    case 'closed':
                        return '<p class="label-closed">'.trans('saas::app.super.tenants.orders.index.datagrid.closed').'</p>';

                    case 'pending':
                        return '<p class="label-pending">'.trans('saas::app.super.tenants.orders.index.datagrid.pending').'</p>';

                    case 'pending_payment':
                        return '<p class="label-pending">'.trans('saas::app.super.tenants.orders.index.datagrid.pending-payment').'</p>';

                    case 'fraud':
                        return '<p class="label-canceled">'.trans('saas::app.super.tenants.orders.index.datagrid.fraud').'</p>';
                }
            },
        ]);

        $this->addColumn([
            'index'      => 'base_grand_total',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.grand-total'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'method',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.pay-via'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                return core()->getConfigData('sales.payment_methods.'.$row->method.'.title');
            },
        ]);

        $this->addColumn([
            'index'      => 'channel_name',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.channel-name'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => false,
        ]);

        $this->addColumn([
            'index'      => 'full_name',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.customer'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'customer_email',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.email'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => false,
        ]);

        $this->addColumn([
            'index'      => 'location',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.location'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
        ]);

        $this->addColumn([
            'index'      => 'image',
            'label'      => trans('saas::app.super.tenants.orders.index.datagrid.images'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($value) {
                $order = app(OrderRepository::class)->with('items')->find($value->id);

                return view('saas::super.tenants.orders.images', compact('order'))->render();
            },
        ]);

        $this->addColumn([
            'index'           => 'created_at',
            'label'           => trans('saas::app.super.tenants.orders.index.datagrid.date'),
            'type'            => 'date',
            'searchable'      => false,
            'filterable'      => true,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);
    }
}