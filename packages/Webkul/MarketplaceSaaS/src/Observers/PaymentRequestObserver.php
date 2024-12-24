<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Webkul\MarketplaceSaaS\Models\PaymentRequest;

class PaymentRequestObserver
{
    public function creating(PaymentRequest $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
