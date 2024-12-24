<?php

namespace Webkul\SAASCustomizer\Observers\DataTransfer;

use Webkul\SAASCustomizer\Models\DataTransfer\Import;
use Webkul\SAASCustomizer\Facades\Company;

class ImportObserver
{
    public function creating(Import $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}