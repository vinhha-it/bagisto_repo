<?php

namespace Webkul\MarketplaceSaaS\Models;

use Webkul\Marketplace\Models\PaymentRequest as BaseModel;

class PaymentRequest extends BaseModel
{
    protected $table = 'payment_requests';

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        $company = company()->getCurrent();

        if (auth()->guard('super-admin')->check() || !isset($company->id)) {
            return new \Illuminate\Database\Eloquent\Builder($query);
        } else {
            return new \Illuminate\Database\Eloquent\Builder($query->where('marketplace_products' . '.company_id', $company->id));
        }
    }
}
