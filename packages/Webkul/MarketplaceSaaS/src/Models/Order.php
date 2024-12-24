<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\Order as BaseModel;

class Order extends BaseModel
{
    protected $table = 'marketplace_orders';

    /**
     * Fillable.
     *
     * @var array
     */
    protected $guarded = ['_token'];

    protected $statusLabel = [
        'pending'         => 'Pending',
        'pending_payment' => 'Pending Payment',
        'payment_request' => 'Payment Requested',
        'processing'      => 'Processing',
        'completed'       => 'Completed',
        'canceled'        => 'Canceled',
        'closed'          => 'Closed',
        'fraud'           => 'Fraud',
    ];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        $company = company()->getCurrent();

        if (auth()->guard('super-admin')->check() || !isset($company->id)) {
            return new \Illuminate\Database\Eloquent\Builder($query);
        } else {
            return new \Illuminate\Database\Eloquent\Builder($query->where('marketplace_orders' . '.company_id', $company->id));
        }
    }
}
