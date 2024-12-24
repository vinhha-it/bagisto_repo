<?php

namespace Webkul\SAASCustomizer\Observers\Checkout;

use Webkul\SAASCustomizer\Models\Checkout\CartItem;
use Webkul\SAASCustomizer\Facades\Company;

class CartItemObserver
{
    public function creating(CartItem $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}