<?php

namespace Webkul\SAASCustomizer\Models\Category;

use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\QueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Category\Models\Category as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class Category extends BaseModel
{

    /**
     * Translated attributes.
     *
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'description',
        'slug',
        'url_path',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable = [
        'position',
        'status',
        'display_mode',
        'parent_id',
        'additional',
        'company_id',
    ];

    /**
     * Eager loading.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * Appends.
     *
     * @var array
     */
    protected $appends = ['logo_url', 'banner_url', 'url', 'count'];

    // Implement the attribute
    public function getCountAttribute()
    {
        $data = DB::table('product_categories')->newQuery()->from('product_categories')->where('category_id', $this->id)->get();
        
        return count($data);
    }
    
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
            return new QueryBuilder($query->where('categories.company_id', $company->id));
        }
    }
}
