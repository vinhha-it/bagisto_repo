<?php

namespace Webkul\SAASCustomizer\Models\CatalogRule;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\CatalogRule\Models\CatalogRuleProductPrice as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class CatalogRuleProductPrice extends BaseModel
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('catalog_rule_product_prices'.'.company_id', $company->id));
        }
    }

    public function insert($rows)
    {
        $company = Company::getCurrent();
        parent::insert(data_fill($rows, '*.company_id', $company->id));
    }
}
