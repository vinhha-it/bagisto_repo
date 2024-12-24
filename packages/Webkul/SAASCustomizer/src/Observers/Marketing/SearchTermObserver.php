<?php

namespace Webkul\SAASCustomizer\Observers\Marketing;

use Webkul\SAASCustomizer\Models\Marketing\SearchTerm;
use Webkul\SAASCustomizer\Facades\Company;

class SearchTermObserver
{
    public function creating(SearchTerm $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}