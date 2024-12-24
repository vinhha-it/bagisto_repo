<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Admin;

use Webkul\User\Repositories\AdminRepository;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Facades\Company;

/**
 * SessionController
 */
class SessionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param \Webkul\User\Repositories\AdminRepository  $adminRepository
     *
     * @return void
     */
    public function __construct(protected AdminRepository $adminRepository)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $company = Company::getCurrent();

        $this->validate(request(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = request('remember');

        $admin = $this->adminRepository->findOneWhere(['email' => request()->email]);

        if (
            ! isset($admin['company_id']) 
            || $admin['company_id'] != $company->id 
        ) {
            session()->flash('error', trans('admin::app.settings.users.login-error'));

            return redirect()->back();
        }

        if (! auth()->guard('admin')->attempt(request(['email', 'password']), $remember)) {
            session()->flash('error', trans('admin::app.settings.users.login-error'));

            return redirect()->back();
        }

        if (! auth()->guard('admin')->user()->status) {
            session()->flash('warning', trans('admin::app.settings.users.activate-warning'));

            auth()->guard('admin')->logout();

            return redirect()->route('admin.session.create');
        }

        return redirect()->intended(route('admin.dashboard.index'));
    }
}