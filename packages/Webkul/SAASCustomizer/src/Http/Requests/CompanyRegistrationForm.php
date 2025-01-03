<?php

namespace Webkul\SAASCustomizer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRegistrationForm extends FormRequest
{
    protected $rules;

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
        $this->rules = [
            'email'         => 'required|email|max:191|unique:admins,email',
            'password'      => 'required|string|confirmed|min:6',
            'first_name'    => 'required|string|max:191',
            'last_name'     => 'nullable|string|max:191',
            'phone'         => 'required|numeric|unique:company_personal_details,phone',
            'username'      => 'required|alpha_num|min:3|max:64|unique:companies,username',
            'name'          => 'required|string|max:191|unique:companies,name',
        ];
        
        return $this->rules;
    }
}
