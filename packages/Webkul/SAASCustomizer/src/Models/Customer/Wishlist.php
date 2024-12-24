<?php

namespace Webkul\SAASCustomizer\Models\Customer;

use Webkul\Customer\Models\Wishlist as BaseModel;
use Webkul\SAASCustomizer\Facades\Company;

class Wishlist extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wishlist_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'channel_id',
        'product_id',
        'customer_id',
        'item_options',
        'moved_to_cart',
        'shared',
        'company_id'
    ];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        $company = Company::getCurrent();

        if (auth()->guard('super-admin')->check() || ! isset($company->id)) {
            return new \Illuminate\Database\Eloquent\Builder($query);
        } else {
            return new \Illuminate\Database\Eloquent\Builder($query->where('wishlist_items'.'.company_id', $company->id));
        }
    }
}
