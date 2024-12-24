<?php

namespace Webkul\SAASCustomizer\Observers\CatalogRule;

use Webkul\SAASCustomizer\Models\CatalogRule\CatalogRule;
use Webkul\SAASCustomizer\Facades\Company;

class CatalogRuleObserver
{
    public function creating(CatalogRule $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}