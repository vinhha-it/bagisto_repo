<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Facades\Company;

class CompanyProfileController extends Controller
{
    /**
     * To load the company profile index view
     */
    public function index()
    {
        $company = Company::getCurrent();

        $details = $company->details;

        return view('saas::admin.details', compact('company', 'details'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $company = Company::getCurrent();

        $companyDetails = $company->details;

        $this->validate($request, [
            'first_name' => 'string|required|max:191',
            'last_name'  => 'string|required|max:191',
            'phone'      => 'required|numeric|unique:company_personal_details,phone,'.$companyDetails->id,
            'email'      => 'required|email|max:191|unique:company_personal_details,email,'.$companyDetails->id,
            'cname'      => 'string|unique:companies,cname,'.$company->id,
            'skype'      => 'string|min:6|max:32',
        ]);
        
        $data = request()->all();

        if (! $data['cname']) {
            $data['cname'] = null;
        }

        if ($companyDetails->update($data)) {
            
            if ( isset($data['cname']) && $data['cname'] ) {
                $company->cname = $data['cname'];
                $company->save();
            }

            session()->flash('success', trans('saas::app.admin.tenant-profile.update-success', ['resource' => 'Company profile']));
        } else {
            session()->flash('error', trans('saas::app.admin.tenant-profile.update-failed', ['resource' => 'Company profile']));
        }

        return redirect()->route('admin.company.profile.index');
    }
}