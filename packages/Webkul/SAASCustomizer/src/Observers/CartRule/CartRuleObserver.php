<?php

namespace Webkul\SAASCustomizer\Observers\CartRule;

use Webkul\SAASCustomizer\Models\CartRule\CartRule as CartRuleModel;
use Webkul\SAASCustomizer\Facades\Company;

class CartRuleObserver
{
    public function creating(CartRuleModel $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}