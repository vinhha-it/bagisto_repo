<?php

namespace Webkul\SAASCustomizer\Models\Theme;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Theme\Models\ThemeCustomization as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class ThemeCustomization extends BaseModel
{
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('theme_customizations'.'.company_id', $company->id));
        }
    }
}