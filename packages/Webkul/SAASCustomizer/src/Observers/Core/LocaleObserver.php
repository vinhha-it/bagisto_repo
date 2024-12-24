<?php

namespace Webkul\SAASCustomizer\Observers\Core;

use Webkul\SAASCustomizer\Models\Core\Locale;
use Webkul\SAASCustomizer\Facades\Company;

class LocaleObserver
{
    public function creating(Locale $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }

    public function deleting(Locale $model)
    {
        if ($model->count() == 1) {
            session()->flash('error', trans('saas::app.tenant.custom-errors.locale-delete'));
        }
    }
}