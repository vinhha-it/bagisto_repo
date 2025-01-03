<?php

namespace Webkul\SAASCustomizer\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Webkul\SAASCustomizer\Helpers\Locales;

class TranslatableModel extends Model
{
    use Translatable;

    /**
     * Get locales helper.
     *
     * @return \Webkul\SAASCustomizer\Helpers\Locales
     */
    protected function getLocalesHelper(): Locales
    {
        return app(Locales::class);
    }

    /**
     * Locale. This method is being overridden to address the
     * performance issues caused by the existing implementation
     * which increases application time.
     *
     * @return string
     */
    protected function locale()
    {
        if ($this->isChannelBased()) {
            return company()->getDefaultChannelLocaleCode();
        } else {
            if ($this->defaultLocale) {
                return $this->defaultLocale;
            }
            
            return config('translatable.locale') ?: app()->make('translator')->getLocale();
        }
    }

    /**
     * Is channel based.
     *
     * @return bool
     */
    protected function isChannelBased()
    {
        return false;
    }
}
