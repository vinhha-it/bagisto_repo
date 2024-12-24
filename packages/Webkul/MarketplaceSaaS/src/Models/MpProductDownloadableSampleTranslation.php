<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\MpProductDownloadableSampleTranslation as BaseModel;

class MpProductDownloadableSampleTranslation extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'company_id',
    ];

    protected $table = 'mp_product_downloadable_sample_translations';

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
            return new \Illuminate\Database\Eloquent\Builder($query->where('mp_product_downloadable_sample_translations' . '.company_id', $company->id));
        }
    }
}
