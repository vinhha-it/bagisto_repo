<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\MpProductDownloadableLink as BaseModel;

class MpProductDownloadableLink extends BaseModel
{
    public $translatedAttributes = ['title'];

    protected $table = 'mp_product_downloadable_links';

    protected $fillable = [
        'title',
        'price',
        'url',
        'file',
        'file_name',
        'type',
        'sample_url',
        'sample_file',
        'sample_file_name',
        'sample_type',
        'sort_order',
        'product_id',
        'downloads',
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('mp_product_downloadable_links' . '.company_id', $company->id));
        }
    }
}
