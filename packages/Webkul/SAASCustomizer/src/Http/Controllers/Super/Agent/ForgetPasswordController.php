<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Agent;

use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Webkul\SAASCustomizer\Http\Controllers\Controller;

class ForgetPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->guard('super-admin')->check()) {
            return redirect()->route('super.tenants.companies.index');
        }
        
        if (strpos(url()->previous(), 'super') !== false) {
            $intendedUrl = url()->previous();
        } else {
            $intendedUrl = route('super.tenants.companies.index');
        }

        session()->put('url.intended', $intendedUrl);

        return view('saas::super.agents.forget-password.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try {
            $this->validate(request(), [
                'email' => 'required|email',
            ]);

            $response = $this->broker()->sendResetLink(
                request(['email'])
            );

            if ($response == Password::RESET_LINK_SENT) {
                session()->flash('success', trans('saas::app.super.agents.forget-password.create.reset-link-sent'));

                return back();
            }

            return back()
                ->withInput(request(['email']))
                ->withErrors([
                    'email' => trans('saas::app.super.agents.forget-password.create.email-not-exist'),
                ]);
            
            if ($response == Password::RESET_LINK_SENT) {
                session()->flash('success', trans($response));

                return back();
            }

            return back()
                ->withInput(request(['email']))
                ->withErrors(
                    ['email' => trans($response)]
                );
        } catch (\Exception $e) {
            session()->flash('error', trans($e->getMessage()));

            return redirect()->back();
        }
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('superadmins');
    }
}