<?php

namespace Webkul\SAASCustomizer\Observers\Tax;

use Webkul\SAASCustomizer\Models\Tax\TaxRate;
use Webkul\SAASCustomizer\Facades\Company;

class TaxRateObserver
{
    public function creating(TaxRate $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}