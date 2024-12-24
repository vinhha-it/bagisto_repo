<?php

namespace Webkul\Marketplace\Listeners;

use Illuminate\Support\Arr;
use Webkul\Marketplace\Repositories\ProductRepository;

class Product
{
    /**
     * Create a new listener instance.
     *
     * @return void
     */
    public function __construct(protected ProductRepository $productRepository)
    {
    }

    /**
     * Update product for seller if Seller is owner
     */
    public function beforeUpdate(int $id)
    {
        $product = $this->productRepository->findOneByField('product_id', $id);

        if (
            request()->route()->getName() == 'admin.catalog.products.update'
            && $product?->is_owner == 1
        ) {
            $request = request();

            if ($request->has('inventories')) {
                $request->request->remove('inventories');
            }

            if ($request->has('variants')) {
                foreach ($request->get('variants') as $key => $variant) {
                    $variants[$key] = Arr::except($variant, ['inventories']);
                }

                $request->merge(['variants' => $variants]);
            }
        }
    }

    /**
     * Update product for seller if Seller is owner
     */
    public function afterUpdate(object $product)
    {
        if (
            request()->get('value') == 1
            && request()->route()->getName() == 'admin.catalog.products.mass_update'
            || (
                request()->get('status') == 1
                && request()->route()->getName() == 'admin.catalog.products.update'
            )
        ) {
            $sellerProduct = $this->productRepository->findOneWhere([
                'product_id' => $product->id,
                'is_owner'   => 1,
            ]);

            if ($sellerProduct) {
                $this->productRepository->where('product_id', $product->id)
                    ->update(['is_approved' => 1]);
            }
        }
    }
}
