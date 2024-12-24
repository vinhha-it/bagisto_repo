<?php

namespace Webkul\SAASCustomizer\Observers\Theme;

use Webkul\SAASCustomizer\Models\Theme\ThemeCustomization;
use Webkul\SAASCustomizer\Facades\Company;

class ThemeCustomizationObserver
{
    public function creating(ThemeCustomization $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}