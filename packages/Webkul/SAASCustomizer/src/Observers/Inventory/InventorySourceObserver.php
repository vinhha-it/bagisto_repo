<?php

namespace Webkul\SAASCustomizer\Observers\Inventory;

use Webkul\SAASCustomizer\Models\Inventory\InventorySource;
use Webkul\SAASCustomizer\Facades\Company;

class InventorySourceObserver
{
    public function creating(InventorySource $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}