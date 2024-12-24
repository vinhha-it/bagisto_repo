<?php

namespace Webkul\SAASCustomizer\Helpers;

use Astrotomic\Translatable\Locales as BaseLocales;

class Locales extends BaseLocales
{
    /**
     * Load.
     *
     * @return void
     */
    public function load(): void
    {
        $this->locales = [];

        foreach (company()->getAllLocales() as $locale) {
            $this->locales[$locale->code] = $locale->code;
        }
    }
}
