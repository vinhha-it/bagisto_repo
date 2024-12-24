<?php

namespace Webkul\SAASCustomizer\Observers\Sales;

use Webkul\SAASCustomizer\Models\Sales\OrderTransaction;
use Webkul\SAASCustomizer\Facades\Company;

class OrderTransactionObserver
{
    public function creating(OrderTransaction $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}