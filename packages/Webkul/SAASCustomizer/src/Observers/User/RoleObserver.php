<?php

namespace Webkul\SAASCustomizer\Observers\User;

use Webkul\SAASCustomizer\Models\User\Role;
use Webkul\SAASCustomizer\Facades\Company;

class RoleObserver
{
    public function creating(Role $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}