<?php

namespace Webkul\SAASSubscription\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASSubscription\Contracts\PurchasedPlan as PurchasedPlanContract;

class PurchasedPlan extends Model implements PurchasedPlanContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'saas_subscription_purchased_plans';

    /**
     * Guarded property
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
        'name',
        'code',
        'description',
        'monthly_amount',
        'yearly_amount',
        'allowed_products',
        'allowed_categories',
        'allowed_attributes',
        'allowed_attribute_families',
        'allowed_channels',
        'allowed_orders',
        'saas_subscription_recurring_profile_id',
        'company_id',
    ];

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
