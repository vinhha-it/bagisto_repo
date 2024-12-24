<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Webkul\MarketplaceSaaS\Models\ShipmentItem;

class ShipmentItemObserver
{
    public function creating(ShipmentItem $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
