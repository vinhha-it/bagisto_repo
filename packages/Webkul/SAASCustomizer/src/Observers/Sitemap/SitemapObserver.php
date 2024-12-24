<?php

namespace Webkul\SAASCustomizer\Observers\Sitemap;

use Webkul\SAASCustomizer\Models\Sitemap\Sitemap;
use Webkul\SAASCustomizer\Facades\Company;

class SitemapObserver
{
    public function creating(Sitemap $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}