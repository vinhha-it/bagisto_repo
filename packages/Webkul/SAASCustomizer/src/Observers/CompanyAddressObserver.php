<?php

namespace Webkul\SAASCustomizer\Observers;

use Webkul\SAASCustomizer\Models\CompanyAddress;
use Webkul\SAASCustomizer\Facades\Company;

class CompanyAddressObserver
{
    public function creating(CompanyAddress $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}