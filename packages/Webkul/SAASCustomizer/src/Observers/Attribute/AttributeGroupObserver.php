<?php

namespace Webkul\SAASCustomizer\Observers\Attribute;

use Webkul\SAASCustomizer\Models\Attribute\AttributeGroup;
use Webkul\SAASCustomizer\Facades\Company;

class AttributeGroupObserver
{
    public function creating(AttributeGroup $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}