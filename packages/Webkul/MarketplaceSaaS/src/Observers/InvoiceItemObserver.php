<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Webkul\MarketplaceSaaS\Models\InvoiceItem;

class InvoiceItemObserver
{
    public function creating(InvoiceItem $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
