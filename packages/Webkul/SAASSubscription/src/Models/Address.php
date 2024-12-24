<?php

namespace Webkul\SAASSubscription\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASSubscription\Contracts\Address as AddressContract;

class Address extends Model implements AddressContract
{
    /**
     * Define the table name
     */
    protected $table = 'saas_subscription_billing_addresses';

    /**
     * Gauarded properties
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'state',
        'postcode',
        'country',
        'phone',
        'saas_subscription_recurring_profile_id',
        'saas_subscription_invoice_id',
        'company_id',
    ];

    /**
     * Get of the customer fullname.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Get the recurring profile that owns the purchased plan.
     *
     * @return object
     */
    public function recurring_profile()
    {
        return $this->belongsTo(RecurringProfileProxy::modelClass(), 'saas_subscription_recurring_profile_id');
    }
}
