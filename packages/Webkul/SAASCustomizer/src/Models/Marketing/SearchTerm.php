<?php

namespace Webkul\SAASCustomizer\Models\Marketing;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Marketing\Models\SearchTerm as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class SearchTerm extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'term',
        'results',
        'uses',
        'redirect_url',
        'display_in_suggested_terms',
        'locale',
        'channel_id',
        'company_id',
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('search_terms'.'.company_id', $company->id));
        }
    }
}