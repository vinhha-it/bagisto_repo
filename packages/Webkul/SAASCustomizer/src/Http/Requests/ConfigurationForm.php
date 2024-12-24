<?php

namespace Webkul\SAASCustomizer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationForm extends FormRequest
{
    /**
     * Determine if the Configuraion is authorized to make this request.
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
        $this->rules = [];

        if (
            request()->has('general.design.super_admin_logo.logo_image')
            && ! request()->input('general.design.super_admin_logo.logo_image.delete')
        ) {
            $this->rules = array_merge($this->rules, [
                'general.design.admin_logo.logo_image' => 'required|mimes:bmp,jpeg,jpg,png,webp|max:5000',
            ]);
        }

        if (
            request()->has('general.design.super_admin_logo.favicon')
            && ! request()->input('general.design.super_admin_logo.favicon.delete')
        ) {
            $this->rules = array_merge($this->rules, [
                'general.design.super_admin_logo.favicon' => 'required|mimes:bmp,jpeg,jpg,png,webp|max:5000',
            ]);
        }

        return $this->rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'general.design.super_admin_logo.logo_image.mimes' => 'Invalid file format. Use only jpeg, bmp, png, jpg.'
        ];
    }
}
