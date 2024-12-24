<?php

namespace Webkul\SAASCustomizer\Observers\BookingProduct;

use Webkul\SAASCustomizer\Models\BookingProduct\Booking;
use Webkul\SAASCustomizer\Facades\Company;

class BookingObserver
{
    public function creating(Booking $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}