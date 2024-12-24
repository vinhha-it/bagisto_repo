<?php

namespace Webkul\SAASSubscription\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanPurchaseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address.first_name' => 'required',
            'address.last_name'  => 'required',
            'address.email'      => 'required',
            'address.address1'   => 'required',
            'address.city'       => 'required',
            'address.state'      => 'required',
            'address.country'    => 'required',
            'address.postcode'   => 'required',
        ];
    }
}
