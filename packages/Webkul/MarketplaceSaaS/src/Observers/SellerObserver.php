<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Webkul\MarketplaceSaaS\Models\Seller;

class SellerObserver
{
    public function creating(Seller $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
