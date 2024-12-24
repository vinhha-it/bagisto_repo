<?php

namespace Webkul\SAASCustomizer\Models;


use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\SAASCustomizer\Contracts\SuperChannel as SuperChannelContract;

class SuperChannel extends TranslatableModel implements SuperChannelContract
{
    /**
     * Translated attributes.
     *
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'description',
        'home_seo',
    ];

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'theme',
        'hostname',
        'default_locale_id',
        'base_currency_id',
    ];

    /**
     * Eager loading.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * Get the super channel locales.
     */
    public function locales(): BelongsToMany
    {
        return $this->belongsToMany(LocaleProxy::modelClass(), 'super_channel_locales', 'super_channel_id', 'super_locale_id');
    }

    /**
     * Get the default locale
     */
    public function default_locale(): BelongsTo
    {
        return $this->belongsTo(LocaleProxy::modelClass());
    }

    /**
     * Get the super channel currencies.
     */
    public function currencies()
    {
        return $this->belongsToMany(CurrencyProxy::modelClass(), 'super_channel_currencies', 'super_channel_id', 'super_currency_id');
    }

    /**
     * Get the base currency
     */
    public function base_currency(): BelongsTo
    {
        return $this->belongsTo(CurrencyProxy::modelClass());
    }

    /**
     * Get logo image url.
     */
    public function logo_url()
    {
        if (! $this->logo)
            return;

        return Storage::url($this->logo);
    }

    /**
     * Get logo image url.
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo_url();
    }

    /**
     * Get favicon image url.
     */
    public function favicon_url()
    {
        if (! $this->favicon)
            return;

        return Storage::url($this->favicon);
    }

    /**
     * Get favicon image url.
     */
    public function getFaviconUrlAttribute()
    {
        return $this->favicon_url();
    }
}
