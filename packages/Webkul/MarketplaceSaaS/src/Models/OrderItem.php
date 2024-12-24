<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\OrderItem as BaseModel;

class OrderItem extends BaseModel
{
    public $timestamps = false;

    protected $table = 'marketplace_order_items';

    /**
     * Fillable.
     *
     * @var array
     */
    protected $guarded = ['_token'];

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
            return new \Illuminate\Database\Eloquent\Builder($query->where('marketplace_order_items' . '.company_id', $company->id));
        }
    }
}
