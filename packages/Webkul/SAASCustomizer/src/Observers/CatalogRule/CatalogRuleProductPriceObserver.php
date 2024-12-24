<?php

namespace Webkul\SAASCustomizer\Observers\CatalogRule;

use Webkul\SAASCustomizer\Models\CatalogRule\CatalogRuleProductPrice;
use Webkul\SAASCustomizer\Facades\Company;

class CatalogRuleProductPriceObserver
{
    public function creating(CatalogRuleProductPrice $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}