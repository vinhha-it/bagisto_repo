<?php

namespace Webkul\SAASCustomizer\Observers\Core;

use Webkul\SAASCustomizer\Models\Core\CurrencyExchangeRate;
use Webkul\SAASCustomizer\Facades\Company;

class CurrencyExchangeRateObserver
{
    public function creating(CurrencyExchangeRate $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}