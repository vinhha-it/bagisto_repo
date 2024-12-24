<?php

namespace Webkul\SAASCustomizer\Observers\CMS;

use Webkul\SAASCustomizer\Models\CMS\Page;
use Webkul\SAASCustomizer\Facades\Company;

class PageObserver
{
    public function creating(Page $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}