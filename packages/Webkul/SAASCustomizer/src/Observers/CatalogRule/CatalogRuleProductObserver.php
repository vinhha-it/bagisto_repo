<?php

namespace Webkul\SAASCustomizer\Observers\CatalogRule;

use Webkul\SAASCustomizer\Models\CatalogRule\CatalogRuleProduct;
use Webkul\SAASCustomizer\Facades\Company;

class CatalogRuleProductObserver
{
    public function creating(CatalogRuleProduct $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}