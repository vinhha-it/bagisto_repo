<?php

namespace Webkul\SAASCustomizer\Observers\Marketing;

use Webkul\SAASCustomizer\Models\Marketing\URLRewrite;
use Webkul\SAASCustomizer\Facades\Company;

class URLRewriteObserver
{
    public function creating(URLRewrite $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}