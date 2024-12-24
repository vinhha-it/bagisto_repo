<?php

namespace Webkul\SAASCustomizer\Observers\Category;

use Webkul\SAASCustomizer\Models\Category\Category;
use Webkul\SAASCustomizer\Facades\Company;

class CategoryObserver
{
    public function creating(Category $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}