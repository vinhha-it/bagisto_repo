<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Webkul\SAASCustomizer\Contracts\Currency as CurrencyContract;

class Currency extends Model implements CurrencyContract
{
    protected $table = 'super_currencies';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'symbol',
        'decimal'
    ];

    /**
     * Set currency code in capital
     *
     * @param  string  $value
     * @return void
     */
    public function setCodeAttribute($code)
    {
        $this->attributes['code'] = strtoupper($code);
    }

    /**
     * Get the currency_exchange associated with the currency.
     */
    public function exchange_rate(): HasOne
    {
        return $this->hasOne(CurrencyExchangeRateProxy::modelClass(), 'target_currency');
    }
}
