<?php

namespace Webkul\MarketplaceSaaS\Models;

use Illuminate\Support\Facades\Log;
use Webkul\Checkout\Models\CartItem as BaseModel;

class CartItem extends BaseModel
{
    protected $table = 'cart_items';

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
            return new \Illuminate\Database\Eloquent\Builder($query->where('cart_items' . '.company_id', $company->id));
        }
    }
}
