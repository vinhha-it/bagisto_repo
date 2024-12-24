<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Illuminate\Support\Facades\Log;
use Webkul\MarketplaceSaaS\Models\CartItem;

class CartItemObserver
{
    public function creating(CartItem $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
