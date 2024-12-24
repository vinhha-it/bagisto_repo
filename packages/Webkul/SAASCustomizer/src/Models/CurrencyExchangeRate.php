<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\SAASCustomizer\Contracts\CurrencyExchangeRate as CurrencyExchangeRateContract;

class CurrencyExchangeRate extends Model implements CurrencyExchangeRateContract
{
    protected $table = 'super_currency_exchange_rates';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target_currency',
        'rate'
    ];

    /**
     * Get the exchange rate associated with the currency.
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(CurrencyProxy::modelClass(), 'target_currency');
    }
}
