<?php

namespace Webkul\SAASCustomizer\Observers\Checkout;

use Webkul\SAASCustomizer\Models\Checkout\CartPayment;

class CartPaymentObserver
{
    public function creating(CartPayment $model)
    {
    }
}