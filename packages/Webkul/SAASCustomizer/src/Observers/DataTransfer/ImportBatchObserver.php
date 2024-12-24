<?php

namespace Webkul\SAASCustomizer\Observers\DataTransfer;

use Webkul\SAASCustomizer\Models\DataTransfer\ImportBatch;
use Webkul\SAASCustomizer\Facades\Company;

class ImportBatchObserver
{
    public function creating(ImportBatch $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}