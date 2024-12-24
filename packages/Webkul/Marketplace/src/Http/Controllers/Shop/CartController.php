<?php

namespace Webkul\Marketplace\Http\Controllers\Shop;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Webkul\Checkout\Contracts\Cart as CartModel;
use Webkul\Checkout\Facades\Cart;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Marketplace\Repositories\ProductRepository as SellerProductRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Http\Resources\CartResource;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected WishlistRepository $wishlistRepository,
        protected ProductRepository $productRepository,
        protected SellerProductRepository $sellerProductRepository
    ) {
    }

    /**
     * Function for guests user to add the product in the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        try {
            $product = $this->productRepository->with('parent')->find($id);

            if (request()->get('is_buy_now')) {
                Cart::deActivateCart();
            }

            $cart = Cart::addProduct($product->id, request()->all());

            if (
                is_array($cart)
                && isset($cart['warning'])
            ) {
                session()->flash('warning', $cart['warning']);
            }

            if ($cart instanceof CartModel) {
                session()->flash('success', trans('shop::app.checkout.cart.item-add-to-cart'));

                if ($customer = auth()->guard('customer')->user()) {
                    $this->wishlistRepository->deleteWhere([
                        'product_id'  => $product->id,
                        'customer_id' => $customer->id,
                    ]);
                }

                if (request()->get('is_buy_now')) {
                    Event::dispatch('shop.item.buy-now', $id);

                    return redirect()->route('shop.checkout.onepage.index');
                }
            }
        } catch (\Exception $e) {
            session()->flash('warning', __($e->getMessage()));

            $product = $this->productRepository->find($id);

            Log::error(
                'Shop CartController: '.$e->getMessage(),
                ['product_id' => $id, 'cart_id' => cart()->getCart() ?? 0]
            );

            return redirect()->route('marketplace.product.offers.index', $id);
        }

        return Back();
    }

    /**
     * Function for guests user to add the product in the cart.
     */
    public function store(): JsonResource
    {
        try {
            $id = request()->input('product_id');

            $sellerProduct = $this->sellerProductRepository->with('product')->findOneByField('product_id', $id);

            request()->merge([
                'product_id'  => $sellerProduct->id,
                'seller_info' => [
                    'product_id' => $sellerProduct->id,
                    'seller_id'  => $sellerProduct->marketplace_seller_id,
                    'is_owner'   => $sellerProduct->is_owner,
                ],
            ]);

            if (request()->get('is_buy_now')) {
                Cart::deActivateCart();
            }

            $result = Cart::addProduct($id, request()->all());

            if ($result instanceof CartModel) {
                return new JsonResource([
                    'data'     => new CartResource(Cart::getCart()),
                    'message'  => trans('shop::app.checkout.cart.item-add-to-cart'),
                ]);

                if ($customer = auth()->guard('customer')->user()) {
                    if (
                        $result->items[0]->additional['seller_info']
                        && $result->items[0]->additional['seller_info']['is_owner']
                    ) {
                        $this->wishlistRepository->deleteWhere([
                            'product_id'  => $id,
                            'customer_id' => $customer->id,
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            return new JsonResource([
                'redirect_uri' => route('shop.product_or_category.index', $sellerProduct->product->url_key),
                'message'      => $e->getMessage(),
            ]);
        }
    }
}
