<?php

namespace Webkul\Marketplace\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Marketplace\Contracts\OrderItem;

class OrderItemRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return OrderItem::class;
    }

    /**
     * @param  mixed  $sellerOrderItem
     * @return mixed
     */
    public function collectTotals($sellerOrderItem)
    {
        $commissionPercentage = $sellerOrderItem->order->commission_percentage;

        $sellerOrderItem->commission_invoiced = $sellerOrderItem->base_commission_invoiced = 0;
        $sellerOrderItem->seller_total_invoiced = $sellerOrderItem->base_seller_total_invoiced = 0;

        foreach ($sellerOrderItem->item->invoice_items as $invoiceItem) {
            $sellerOrderItem->commission_invoiced += $commission = ($invoiceItem->total * $commissionPercentage) / 100;
            $sellerOrderItem->base_commission_invoiced += $baseCommission = ($invoiceItem->base_total * $commissionPercentage) / 100;

            $sellerOrderItem->seller_total_invoiced += $invoiceItem->total + $invoiceItem->tax_amount - $commission;
            $sellerOrderItem->base_seller_total_invoiced += $invoiceItem->base_total + $invoiceItem->base_tax_amount - $baseCommission;
        }

        $sellerOrderItem->save();

        return $sellerOrderItem;
    }
}
