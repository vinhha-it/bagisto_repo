<?php
namespace Webkul\SAASCustomizer\Models\Customer;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Customer\Models\CustomerAddress as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class CustomerAddress extends BaseModel
{
    protected $fillable = [
        'company_name',
        'first_name',
        'last_name',
        'vat_id',
        'address',
        'country',
        'state',
        'city',
        'postcode',
        'phone',
        'email',
        'default_address',
        'customer_id',
        'company_id',
    ];

    /**
     * Get the company that owns the customer.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(CompanyProxy::modelClass(), 'company_id');
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        $company = Company::getCurrent();

        if (auth()->guard('super-admin')->check() || ! isset($company->id)) {
            return new \Illuminate\Database\Eloquent\Builder($query);
        } else {
            return new \Illuminate\Database\Eloquent\Builder($query->where('addresses'.'.company_id', $company->id));
        }
    }
}