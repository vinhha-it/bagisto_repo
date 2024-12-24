<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\ProductVideo as BaseModel;

class ProductVideo extends BaseModel
{
    protected $table = 'marketplace_product_videos';

    /**
     * Timestamp.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'path',
        'marketplace_product_id',
        'position',
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
        $company = company()->getCurrent();

        if (auth()->guard('super-admin')->check() || !isset($company->id)) {
            return new \Illuminate\Database\Eloquent\Builder($query);
        } else {
            return new \Illuminate\Database\Eloquent\Builder($query->where('marketplace_product_videos' . '.company_id', $company->id));
        }
    }
}
