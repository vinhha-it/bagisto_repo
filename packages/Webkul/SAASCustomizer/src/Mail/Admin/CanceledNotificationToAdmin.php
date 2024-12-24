<?php


namespace Webkul\SAASCustomizer\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CanceledNotificationToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  \Webkul\Sales\Contracts\Order  $order
     * @return void
     */
    public function __construct(public $order)
    {
    }

    public function build()
    {
        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->to(core()->getAdminEmailDetails()['email'])
            ->subject(trans('admin::app.emails.orders.canceled.subject'))
            ->view('admin::emails.orders.canceled');
    }
}