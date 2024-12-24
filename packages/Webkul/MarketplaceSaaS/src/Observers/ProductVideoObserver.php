<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Webkul\MarketplaceSaaS\Models\ProductVideo;

class ProductVideoObserver
{
    public function creating(ProductVideo $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}