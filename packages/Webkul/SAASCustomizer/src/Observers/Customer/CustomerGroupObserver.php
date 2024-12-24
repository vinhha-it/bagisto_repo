<?php

namespace Webkul\SAASCustomizer\Observers\Customer;

use Webkul\SAASCustomizer\Models\Customer\CustomerGroup;
use Webkul\SAASCustomizer\Facades\Company;

class CustomerGroupObserver
{
    public function creating(CustomerGroup $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}