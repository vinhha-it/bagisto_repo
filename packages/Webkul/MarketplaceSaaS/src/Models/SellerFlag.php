<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\SellerFlag as BaseModel;

class SellerFlag extends BaseModel
{
    protected $table = 'marketplace_seller_flags';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('marketplace_seller_flags' . '.company_id', $company->id));
        }
    }
}
