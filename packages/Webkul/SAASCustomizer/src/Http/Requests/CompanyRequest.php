<?php

namespace Webkul\SAASCustomizer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Webkul\Core\Rules\Code;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($id = $this->id) {
            $company = app('Webkul\SAASCustomizer\Repositories\Super\CompanyRepository')->find($id);

            return [
                'first_name' => 'string|required|max:191',
                'last_name'  => 'string|required|max:191',
                'phone'      => 'unique:company_personal_details,phone,'.$company->details->id,
                'email'      => 'required|email|max:191|unique:admins,email,'.$company->user->id,
                'name'       => 'required|string|max:191|unique:companies,name,'.$id,
                'cname'      => 'string|unique:companies,cname,'.$id,
            ];
        }

        return [
            'first_name' => 'string|required|max:191',
            'last_name'  => 'string|required|max:191',
            'phone'      => 'unique:company_personal_details,phone',
            'email'      => 'required|email|max:191|unique:admins,email',
            'username'   => ['required', 'unique:companies,username', new Code(), 'not_in:'.implode(',', config('excluded-sites'))],
            'name'       => 'required|string|max:191|unique:companies,name',
            'password'   => 'confirmed|min:6|required',
        ];
    }
}
