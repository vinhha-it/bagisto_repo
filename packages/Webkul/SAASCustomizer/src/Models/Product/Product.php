<?php

namespace Webkul\SAASCustomizer\Models\Product;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Product\Models\Product as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class Product extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type',
        'attribute_family_id',
        'sku',
        'parent_id',
        'company_id',
    ];

    /**
     * Status Active.
     */
    public const STATUS_ACTIVE = 1;

    /**
     * Status Inactive.
     */
    public const STATUS_INACTIVE = 0;

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
            return new \Illuminate\Database\Eloquent\Builder($query->where('products'.'.company_id', $company->id));
        }
    }
}
