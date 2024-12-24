<?php

namespace Webkul\SAASCustomizer\Observers\Sales;

use Webkul\SAASCustomizer\Models\Sales\OrderAddress;
use Webkul\SAASCustomizer\Facades\Company;

class OrderAddressObserver
{
    public function creating(OrderAddress $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}