<?php

namespace Webkul\SAASCustomizer\Models\CatalogRule;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\CatalogRule\Models\CatalogRuleProduct as BaseModel;
use Webkul\Core\Models\ChannelProxy;
use Webkul\Customer\Models\CustomerGroupProxy;
use Webkul\CatalogRule\Models\CatalogRuleProxy;
use Webkul\Product\Models\ProductProxy;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class CatalogRuleProduct extends BaseModel
{

    protected $fillable = [
        'starts_from',
        'ends_till',
        'discount_amount',
        'action_type',
        'end_other_rules',
        'sort_order',
        'catalog_rule_id',
        'channel_id',
        'customer_group_id',
        'product_id',
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
     * Get the Catalog Rule that owns the catalog rule.
     */
    public function catalog_rule(): BelongsTo
    {
        return $this->belongsTo(CatalogRuleProxy::modelClass(), 'catalog_rule_id');
    }

    /**
     * Get the Product that owns the catalog rule.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductProxy::modelClass(), 'product_id');
    }

    /**
     * Get the channels that owns the catalog rule.
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(ChannelProxy::modelClass(), 'channel_id');
    }

    /**
     * Get the customer groups that owns the catalog rule.
     */
    public function customer_group(): BelongsTo
    {
        return $this->belongsTo(CustomerGroupProxy::modelClass(), 'customer_group_id');
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
            return new \Illuminate\Database\Eloquent\Builder($query->where('catalog_rule_products'.'.company_id', $company->id));
        }
    }

    public function insert($rows)
    {
        $company = Company::getCurrent();
        parent::insert(data_fill($rows, '*.company_id', $company->id));
    }
}
