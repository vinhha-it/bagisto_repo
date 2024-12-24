<?php

namespace Webkul\SAASCustomizer\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\SAASCustomizer\Notifications\NewOrderNotification;

class OrderAgentMail
{
    /**
     * Send new order Mail to the saas agent
     * 
     * @param mixed $order
     * @return void
     */
    public function handle($order)
    {
        try {
            /**
             * Email to super admin.
             */
            if (company()->getSuperConfigData('general.agent.super.email')) {
                Mail::queue(new NewOrderNotification($order));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }
}