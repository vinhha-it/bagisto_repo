<?php

namespace Webkul\SAASSubscription\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASSubscription\Contracts\Offer as OfferContract;

class Offer extends Model implements OfferContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_status',
        'title',
        'type',
        'price',
        'plan_id',
    ];

    /**
     * Relationship to plan
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
