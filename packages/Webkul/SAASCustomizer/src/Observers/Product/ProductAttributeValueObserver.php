<?php

namespace Webkul\SAASCustomizer\Observers\Product;

use Webkul\SAASCustomizer\Models\Product\ProductAttributeValue;
use Webkul\SAASCustomizer\Facades\Company;

class ProductAttributeValueObserver
{   
    public function creating(ProductAttributeValue $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}