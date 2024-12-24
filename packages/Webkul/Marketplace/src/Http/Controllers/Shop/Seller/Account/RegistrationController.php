<?php

namespace Webkul\Marketplace\Http\Controllers\Shop\Seller\Account;

use Webkul\Core\Rules\Slug;
use Illuminate\Support\Facades\Event;
use Webkul\Marketplace\Repositories\SellerRepository;
use Webkul\Marketplace\Http\Controllers\Shop\Controller;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected SellerRepository $sellerRepository)
    {
    }

    /**
     * Opens up the user's sign up form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('marketplace::shop.default.sellers.account.sign-up');
    }

    /**
     * Method to store user's sign up form data to DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:marketplace_sellers,email'],
            'url'      => ['required', 'unique:marketplace_sellers,url', 'lowercase', new Slug],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        Event::dispatch('marketplace.seller.create.before');

        $seller = $this->sellerRepository->create(array_merge(request()->only([
            'name',
            'email',
            'url',
        ]), [
            'password'              => bcrypt(request()->input('password')),
            'is_approved'           => ! core()->getConfigData('marketplace.settings.general.seller_approval_required'),
            'allowed_product_types' => [
                'simple',
                'configurable',
                'virtual',
                'downloadable',
            ],
        ]));

        Event::dispatch('marketplace.seller.create.after', $seller);

        session()->flash('success', trans('marketplace::app.shop.sellers.account.signup.success'));

        return redirect()->route('marketplace.seller.session.index');
    }
}
