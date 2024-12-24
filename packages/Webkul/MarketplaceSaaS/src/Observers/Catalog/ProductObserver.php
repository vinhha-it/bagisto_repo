<?php

namespace Webkul\MarketplaceSaaS\Observers\Catalog;

use Webkul\MarketplaceSaaS\Models\Catalog\Product;

class ProductObserver
{
    public function creating(Product $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
