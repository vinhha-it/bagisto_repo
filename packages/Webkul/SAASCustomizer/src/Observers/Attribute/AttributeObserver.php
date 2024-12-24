<?php

namespace Webkul\SAASCustomizer\Observers\Attribute;

use Webkul\SAASCustomizer\Models\Attribute\Attribute;
use Webkul\SAASCustomizer\Facades\Company;

class AttributeObserver
{
    protected $allow_attributes = [
        'sku',
        'name',
        'url_key',
        'tax_category_id',
        'new',
        'featured',
        'visible_individually',
        'status',
        'short_description',
        'description',
        'price',
        'cost',
        'special_price',
        'special_price_from',
        'special_price_to',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'width',
        'height',
        'depth',
        'weight',
        'color',
        'size',
        'brand',
        'guest_checkout',
    ];

    public function creating(Attribute $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }

    public function updating(Attribute $model)
    {
        if (! auth()->guard('super-admin')->check()) {
            if (! in_array($model->code, $this->allow_attributes) ) {
            }
        }
    }
}