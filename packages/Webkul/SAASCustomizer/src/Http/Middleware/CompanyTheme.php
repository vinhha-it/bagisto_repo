<?php

namespace Webkul\SAASCustomizer\Http\Middleware;

use Closure;

class CompanyTheme
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $themes = app('themes');
        $channel = company()->getCurrentChannel();

        if (
            $channel
            && $channelThemeCode = $channel->theme
        ) {
            if ($themes->exists($channelThemeCode)) {
                $themes->set($channelThemeCode);
            } else {
                $themes->set(config('themes.company'));
            }
        } else {
            $themes->set(config('themes.company'));
        }

        return $next($request);
    }
}