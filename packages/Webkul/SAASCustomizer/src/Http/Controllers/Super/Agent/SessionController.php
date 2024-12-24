<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Agent;

use Webkul\SAASCustomizer\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
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

        return view('saas::super.agents.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = request('remember');
        
        if (! auth()->guard('super-admin')->attempt(request(['email', 'password']), $remember)) {
            session()->flash('error', trans('saas::app.super.agents.sessions.login-error'));

            return redirect()->back();
        }

        $agent = auth()->guard('super-admin')->user();

        if (! $agent->status) {
            session()->flash('warning', trans('saas::app.super.agents.sessions.activate-warning'));

            auth()->guard('super-admin')->logout();

            return redirect()->route('super.session.create');
        }

        session()->flash('success', trans('saas::app.super.agents.sessions.login-success'));

        return redirect()->intended(route('super.tenants.companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->guard('super-admin')->logout();

        return redirect()->route('super.session.create');
    }
}