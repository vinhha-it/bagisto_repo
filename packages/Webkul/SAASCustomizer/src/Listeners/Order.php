<?php

namespace Webkul\SAASCustomizer\Listeners;

use Webkul\Admin\Listeners\Base;
use Webkul\Admin\Mail\Order\ShippedNotification;
use Webkul\Admin\Mail\Order\InventorySourceNotification;
use Webkul\Admin\Mail\Order\CanceledNotification;
use Webkul\SAASCustomizer\Mail\Admin\CanceledNotificationToAdmin;

class Order extends Base
{
    // use Mails;

    /**
     * Send cancel order mail.
     *
     * @param  \Webkul\Sales\Contracts\Order  $order
     * @return void
     */
    public function sendCancelOrderMail($order)
    {
        try {
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.cancel_order')) {
                return;
            }

            $this->prepareMail($order, new CanceledNotification($order));

            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_admin')) {
                return;
            }
            
            $this->prepareMail($order, new CanceledNotificationToAdmin($order));
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Send new shipment mail to the customer.
     *
     * @param  \Webkul\Sales\Contracts\Shipment  $shipment
     * @return void
     */
    public function sendNewShipmentMail($shipment)
    {
        if ($shipment->email_sent) {
            return;
        }

        try {
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_shipment')) {
                return;
            }

            $this->prepareMail($shipment, new ShippedNotification($shipment));


            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_inventory_source')) {
                return;
            }

            $this->prepareMail($shipment, new InventorySourceNotification($shipment));
        } catch (\Exception $e) {
            report($e);
        }
    }
}
