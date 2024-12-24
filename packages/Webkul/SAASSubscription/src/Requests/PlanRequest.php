<?php

namespace Webkul\SAASSubscription\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Webkul\SAASSubscription\Rules\Plan;

class PlanRequest extends FormRequest
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
        $rules = [
            'name'                       => 'required',
            'monthly_amount'             => 'required|numeric|min:0',
            'yearly_amount'              => 'required|numeric|min:0',
            'allowed_products'           => 'required|numeric|min:1',
            'allowed_categories'         => 'required|numeric|min:1',
            'allowed_attributes'         => 'required|numeric|min:1',
            'allowed_attribute_families' => 'required|numeric|min:1',
            'allowed_channels'           => 'required|numeric|min:1',
            'allowed_orders'             => 'required|numeric|min:1',
            'offer_status'               => 'in:0,1',
            'title'                      => 'nullable',
            'type'                       => 'in:discount,fixed',
            'price'                      => 'numeric|max:100|min:0|nullable',
        ];

        if ($this->offer_status) {
            $rules['title'] = 'required';
            $rules['type'] = 'required|in:discount,fixed';
            $rules['price'] = 'required|numeric|max:100|min:1';
        }

        if (request()->routeIs('super.subscriptions.plans.update')) {
            $rules['code'] = ['required', 'unique:saas_subscription_plans,code,'.$this->id, new Plan];
        } else {
            $rules['code'] = ['required', 'unique:saas_subscription_plans,code', new Plan];
        }

        return $rules;
    }

    /**
     * Merge the modules request if module exist with json
     *
     * @return void
     */
    public function modulesMerge()
    {
        $this->merge([
            'modules' => json_encode($this->modules),
        ]);
    }
}
