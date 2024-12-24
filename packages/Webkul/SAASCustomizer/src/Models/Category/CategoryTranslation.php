<?php

namespace Webkul\SAASCustomizer\Models\Category;

use Kalnoy\Nestedset\QueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Category\Models\CategoryTranslation as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class CategoryTranslation extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'locale_id',
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
            return new QueryBuilder($query);
        } else {
            return new QueryBuilder($query->where('category_translations.company_id', $company->id));
        }
    }
}
