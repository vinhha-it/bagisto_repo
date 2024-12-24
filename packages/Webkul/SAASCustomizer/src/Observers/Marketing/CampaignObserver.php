<?php

namespace Webkul\SAASCustomizer\Observers\Marketing;

use Webkul\SAASCustomizer\Models\Marketing\Campaign;
use Webkul\SAASCustomizer\Facades\Company;

class CampaignObserver
{
    public function creating(Campaign $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}