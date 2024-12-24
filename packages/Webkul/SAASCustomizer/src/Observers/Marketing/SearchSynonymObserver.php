<?php

namespace Webkul\SAASCustomizer\Observers\Marketing;

use Webkul\SAASCustomizer\Models\Marketing\SearchSynonym;
use Webkul\SAASCustomizer\Facades\Company;

class SearchSynonymObserver
{
    public function creating(SearchSynonym $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}