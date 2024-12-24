<?php

namespace Webkul\SocialLogin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Event;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Webkul\SocialLogin\Repositories\CustomerSocialAccountRepository;

class LoginController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SocialLogin\Repositories\CustomerSocialAccountRepository  $customerSocialAccountRepository
     * @return void
     */
    public function __construct(protected CustomerSocialAccountRepository $customerSocialAccountRepository) {}

    /**
     * Redirects to the social provider
     *
     * @param  string  $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        $clientId = core()->getConfigData('customer.social_login.' . $provider . '.' . strtoupper($provider) . '_CLIENT_ID');

        $redirectUri = core()->getConfigData('customer.social_login.' . $provider . '.' . strtoupper($provider) . '_CALLBACK_URL');

        try {
            return Socialite::driver($provider)->with([
                'client_id'    => $clientId ? $clientId : config('services.'.$provider.'.client_id'),
                'redirect_uri' => $redirectUri ? $redirectUri : config('services.'.$provider.'.redirect'),
            ])->redirect();
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->route('shop.customer.session.index');
        }
    }

    /**
     * Handles callback
     *
     * @param  string  $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $clientId = core()->getConfigData('customer.social_login.' . $provider . '.' . strtoupper($provider) . '_CLIENT_ID');

        $clientSecret = core()->getConfigData('customer.social_login.' . $provider . '.' . strtoupper($provider) . '_CLIENT_SECRET');

        $redirect = core()->getConfigData('customer.social_login.' . $provider . '.' . strtoupper($provider) . '_CALLBACK_URL');

        config(['services.'.$provider.'.client_id' => $clientId ? $clientId : config('services.'.$provider.'.client_id')]);

        config(['services.'.$provider.'.client_secret' => $clientSecret ? $clientSecret : config('services.'.$provider.'.client_secret')]);

        config(['services.'.$provider.'.redirect' => $redirect ? $redirect : config('services.'.$provider.'.redirect')]);

        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('shop.customer.session.index');
        }

        $customer = $this->customerSocialAccountRepository->findOrCreateCustomer($user, $provider);

        auth()->guard('customer')->login($customer, true);

        Event::dispatch('customer.after.login', $customer);

        return redirect()->intended(route('shop.customers.account.profile.index'));
    }
}