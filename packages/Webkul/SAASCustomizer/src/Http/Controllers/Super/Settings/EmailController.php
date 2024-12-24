<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Support\Facades\Mail;
use Webkul\SAASCustomizer\Mail\TenantEmail;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CompanyRepository  $companyRepository
     * @return void
     */
    public function __construct(protected CompanyRepository $companyRepository)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saas::super.settings.email.create');
    }

    /**
     * Send an email to tenant.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        $this->validate(request(), [
            'subject' => 'required',
            'body'    => 'required',
        ]);

        $data = request()->only([
            'subject',
            'body',
        ]);

        $companies = $this->companyRepository->get('email')->toArray();
        
        foreach ($companies as $company) {
            $data['email'] = $company['email'];
            
            try {
                Mail::queue(new TenantEmail($data));
            } catch (\Exception $e) {}
        }

        session()->flash('success', trans('saas::app.super.settings.email.send-success'));

        return redirect()->route('super.settings.email.create');
    }
}