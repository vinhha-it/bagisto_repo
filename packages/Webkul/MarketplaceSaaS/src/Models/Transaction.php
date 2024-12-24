<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\Transaction as BaseModel;

class Transaction extends BaseModel
{
    protected $table = 'marketplace_transactions';

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'transaction_id',
        'method',
        'comment',
        'total',
        'base_total',
        'marketplace_seller_id',
        'marketplace_order_id',
        'company_id',
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('marketplace_transactions' . '.company_id', $company->id));
        }
    }
}
