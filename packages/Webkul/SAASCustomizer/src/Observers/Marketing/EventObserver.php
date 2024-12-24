<?php

namespace Webkul\SAASCustomizer\Observers\Marketing;

use Webkul\SAASCustomizer\Models\Marketing\Event;
use Webkul\SAASCustomizer\Facades\Company;

class EventObserver
{
    public function creating(Event $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}