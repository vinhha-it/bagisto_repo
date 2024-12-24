<?php

namespace Webkul\SAASCustomizer\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderNotification extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $order)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(company()->getSuperConfigData('general.agent.super.email'))
                ->subject(trans('shop::app.mail.order.subject'))
                ->view('saas::emails.super-admin.new-order');
    }
}