<?php

namespace Webkul\SAASSubscription\Rules;

use Illuminate\Contracts\Validation\Rule;

class Plan implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-Z0-9]+[a-zA-Z0-9_-]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('saas::app.super-user.common.code');
    }
}
