<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\MpProductDownloadableSample as BaseModel;

class MpProductDownloadableSample extends BaseModel
{
    public $translatedAttributes = ['title'];

    protected $table = 'mp_product_downloadable_samples';

    protected $fillable = [
        'url',
        'file',
        'file_name',
        'type',
        'sort_order',
        'product_id',
        'company_id',
    ];

    protected $with = ['translations'];

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
            return new \Illuminate\Database\Eloquent\Builder($query->where('mp_product_downloadable_samples' . '.company_id', $company->id));
        }
    }
}
