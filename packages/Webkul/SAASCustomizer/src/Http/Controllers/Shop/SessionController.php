<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Shop;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Arr;
use Webkul\Shop\Http\Controllers\Customer\SessionController as BaseSessionController;
use Webkul\Shop\Http\Requests\Customer\LoginRequest;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\SAASCustomizer\Facades\Company;

class SessionController extends BaseSessionController
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository $customerRepository
     * @return void
     */
    public function __construct(protected CustomerRepository $customerRepository)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $loginRequest)
    {
        $customer = $this->customerRepository->findOneByField('email', $loginRequest->email);

        if (! $customer) {
            session()->flash('error', trans('shop::app.customers.login-form.invalid-credentials'));

            return redirect()->back();
        }

        $company = Company::getCurrent();

        if ($customer->company_id != $company->id) {
            session()->flash('error', trans('shop::app.customers.login-form.invalid-credentials'));

            return redirect()->back();
        }

        $credentials = Arr::add($loginRequest->only(['email', 'password']), 'company_id', $company->id) ;

        if (! auth()->guard('customer')->attempt($credentials)) {
            session()->flash('error', trans('shop::app.customers.login-form.invalid-credentials'));

            return redirect()->back();
        }

        if (! auth()->guard('customer')->user()->status) {
            auth()->guard('customer')->logout();

            session()->flash('warning', trans('shop::app.customers.login-form.not-activated'));

            return redirect()->back();
        }

        if (! auth()->guard('customer')->user()->is_verified) {
            session()->flash('info', trans('shop::app.customers.login-form.verify-first'));

            Cookie::queue(Cookie::make('enable-resend', 'true', 1));

            Cookie::queue(Cookie::make('email-for-resend', $loginRequest->get('email'), 1));

            auth()->guard('customer')->logout();

            return redirect()->back();
        }

        /**
         * Event passed to prepare cart after login.
         */
        Event::dispatch('customer.after.login', auth()->guard()->user());

        if (core()->getConfigData('customer.settings.login_options.redirected_to_page') == 'account') {
            return redirect()->route('shop.customers.account.profile.index');
        }

        return redirect()->route('shop.home.index');
    }
}