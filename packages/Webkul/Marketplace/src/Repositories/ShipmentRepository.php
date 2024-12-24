<?php

namespace Webkul\Marketplace\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Eloquent\Repository;
use Webkul\Marketplace\Contracts\Shipment;

class ShipmentRepository extends Repository
{
    /**
     * Create a new repository instance.
     *
     * @param  Webkul\Marketplace\Repositories\SellerRepository  $sellerRepository
     * @param  Webkul\Marketplace\Repositories\ProductRepository  $productRepository
     * @param  Webkul\Marketplace\Repositories\OrderRepository  $orderRepository
     * @param  Webkul\Marketplace\Repositories\ShipmentItemRepository  $shipmentItemRepository
     * @return void
     */
    public function __construct(
        protected SellerRepository $sellerRepository,
        protected ProductRepository $productRepository,
        protected OrderRepository $orderRepository,
        protected ShipmentItemRepository $shipmentItemRepository,
        App $app
    ) {
        parent::__construct($app);
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Shipment::class;
    }

    /**
     * @return mixed
     */
    public function create(array $data)
    {
        $shipment = $data['shipment'];

        Event::dispatch('marketplace.sales.shipment.save.before', $data);

        $sellerShipments = [];

        foreach ($shipment->items()->get() as $item) {
            if (
                isset($item->additional['seller_info'])
                && ! $item->additional['seller_info']['is_owner']
            ) {
                $seller = $this->sellerRepository->find($item->additional['seller_info']['seller_id']);
                $sellers[] = $this->sellerRepository->find($item->additional['seller_info']['seller_id']);
            } else {
                $seller = $this->productRepository->getSellerByProductId($item->product_id);
                $sellers[] = $this->productRepository->getSellerByProductId($item->product_id);
            }

            if (! $seller) {
                continue;
            }

            $sellerOrder = $this->orderRepository->findOneWhere([
                'order_id'              => $shipment->order->id,
                'marketplace_seller_id' => $seller->id,
            ]);

            if (! $sellerOrder) {
                continue;
            }

            $sellerShipment = $this->findOneWhere([
                'shipment_id'          => $shipment->id,
                'marketplace_order_id' => $sellerOrder->id,
            ]);

            if (! $sellerShipment) {
                $sellerShipments[] = $sellerShipment = parent::create([
                    'total_qty'            => $item->qty,
                    'shipment_id'          => $shipment->id,
                    'marketplace_order_id' => $sellerOrder->id,
                ]);
            } else {
                $sellerShipment->total_qty += $item->qty;

                $sellerShipment->save();
            }

            $this->shipmentItemRepository->create([
                'marketplace_shipment_id' => $sellerShipment->id,
                'shipment_item_id'        => $item->id,
            ]);
        }

        foreach ($sellers as $seller) {
            if ($seller) {
                $sellerOrders = $this->orderRepository->findWhere(['order_id' => $shipment->order->id, 'marketplace_seller_id' => $seller->id]);

                foreach ($sellerOrders as $sellerOrder) {
                    $this->orderRepository->updateOrderStatus($sellerOrder);
                }
            }
        }

        foreach ($sellerShipments as $sellerShipment) {
            Event::dispatch('marketplace.sales.shipment.save.after', $sellerShipment);
        }
    }
}
