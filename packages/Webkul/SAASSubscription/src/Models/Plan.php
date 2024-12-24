<?php

namespace Webkul\SAASSubscription\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASSubscription\Contracts\Plan as PlanContract;

class Plan extends Model implements PlanContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'saas_subscription_plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'monthly_amount',
        'yearly_amount',
        'allowed_products',
        'allowed_categories',
        'allowed_attributes',
        'allowed_attribute_families',
        'allowed_channels',
        'allowed_orders',
        'status',
        'modules',
    ];

    /**
     * Relationship to plan
     */
    public function offer()
    {
        return $this->hasOne(Offer::class);
    }
}
