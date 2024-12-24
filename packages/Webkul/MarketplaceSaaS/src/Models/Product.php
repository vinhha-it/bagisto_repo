<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\Product as BaseModel;

class Product extends BaseModel
{
    protected $table = 'marketplace_products';

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'condition',
        'description',
        'price',
        'marketplace_seller_id',
        'parent_id',
        'product_id',
        'is_owner',
        'is_approved',
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('marketplace_products' . '.company_id', $company->id));
        }
    }
}
