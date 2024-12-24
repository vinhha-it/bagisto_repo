<?php

namespace Webkul\SAASCustomizer\Models\Sitemap;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Sitemap\Models\Sitemap as BaseModel;
use Webkul\SAASCustomizer\Facades\Company;
use Webkul\SAASCustomizer\Models\CompanyProxy;

class Sitemap extends BaseModel
{
    protected $fillable = [
        'file_name',
        'path',
        'generated_at',
        'company_id'
    ];

    /**
     * Get the company that owns the customer.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(CompanyProxy::modelClass(), 'company_id');
    }

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
            return new \Illuminate\Database\Eloquent\Builder($query->where('sitemaps'.'.company_id', $company->id));
        }
    }
}