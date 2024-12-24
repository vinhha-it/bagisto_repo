<?php

namespace Webkul\SAASCustomizer\Models\Core;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Core\Models\Channel as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class Channel extends BaseModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'theme',
        'hostname',
        'default_locale_id',
        'base_currency_id',
        'root_category_id',
        'home_seo',
        'is_maintenance_on',
        'maintenance_mode_text',
        'allowed_ips',
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('channels'.'.company_id', $company->id));
        }
    }
}
