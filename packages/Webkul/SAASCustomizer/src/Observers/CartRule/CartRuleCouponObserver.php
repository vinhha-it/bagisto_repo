<?php

namespace Webkul\SAASCustomizer\Observers\CartRule;

use Webkul\SAASCustomizer\Models\CartRule\CartRuleCoupon;
use Webkul\SAASCustomizer\Facades\Company;

class CartRuleCouponObserver
{
    public function creating(CartRuleCoupon $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}