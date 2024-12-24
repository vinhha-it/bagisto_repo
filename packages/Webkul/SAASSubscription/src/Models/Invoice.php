<?php

namespace Webkul\SAASSubscription\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASSubscription\Contracts\Invoice as InvoiceContract;

class Invoice extends Model implements InvoiceContract
{
    /**
     * Define the table of the model
     */
    protected $table = 'saas_subscription_invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'increment_id',
        'status',
        'pending_reason',
        'grand_total',
        'customer_email',
        'customer_name',
        'cycle_expired_on',
        'payment_method',
        'transaction_id',
        'saas_subscription_purchased_plan_id',
        'saas_subscription_recurring_profile_id',
        'company_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'cycle_expired_on' => 'date',
    ];

    /**
     * Get the purchased plan that owns the invoice.
     *
     * @return object
     */
    public function purchased_plan()
    {
        return $this->belongsTo(PurchasedPlanProxy::modelClass(), 'saas_subscription_purchased_plan_id');
    }

    /**
     * Get the recurring profile that owns the invoice.
     *
     * @return object
     */
    public function recurring_profile()
    {
        return $this->belongsTo(RecurringProfileProxy::modelClass(), 'saas_subscription_recurring_profile_id');
    }

    /**
     * Get the company that owns the invoice.
     *
     * @return object
     */
    public function company()
    {
        return $this->belongsTo(CompanyProxy::modelClass(), 'company_id');
    }
}
