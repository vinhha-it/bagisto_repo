<?php

namespace Webkul\SAASCustomizer\Http\Middleware;

use Closure;
use Webkul\SAASCustomizer\Repositories\Super\LocaleRepository;

class CompanyLocale
{
    /**
     * @param \Webkul\SAASCustomizer\Repositories\LocaleRepository  $localeRepository
     */
    public function __construct(protected LocaleRepository $localeRepository)
    {
    }

    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if ($localeCode = company()->getRequestedLocaleCode('company-locale', false)) {
            if ($this->localeRepository->findOneByField('code', $localeCode)) {
                app()->setLocale($localeCode);

                session()->put('company-locale', $localeCode);
            }
        } else {
            if ($locale = session()->get('company-locale')) {
                app()->setLocale($locale);
            } else {
                if (company()->getDefaultChannel()) {
                    app()->setLocale(company()->getDefaultChannelLocaleCode());
                } else {
                    app()->setLocale(app()->getLocale());
                }
            }
        }

        unset($request['company-locale']);

        return $next($request);
    }
}
