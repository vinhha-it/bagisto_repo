<?php

namespace Webkul\SAASCustomizer\Observers\User;

use Webkul\SAASCustomizer\Models\User\Admin;
use Webkul\SAASCustomizer\Facades\Company;

class AdminObserver
{
    public function creating(Admin $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }

    public function updating(Admin $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}