<?php

namespace Webkul\SAASCustomizer\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Webkul\Core\Http\Middleware\CheckForMaintenanceMode;

class SaasCheckForMaintenanceMode extends CheckForMaintenanceMode
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Exclude route names.
     *
     * @var array
     */
    protected $excludedNames = [];

    /**
     * Exclude Channel Ip's.
     *
     * @var array
     */
    protected $excludedIPs = [];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
        if ($this->databaseManager->isInstalled() && $this->app->isDownForMaintenance()) {
            $response = $next($request);

            if (
                in_array($request->ip(), $this->excludedIPs)
                || $this->shouldPassThrough($request)
                || ! (bool) core()->getCurrentChannel()->is_maintenance_on
                || company()->getCurrent() == 'super-company'
            ) {
                return $response;
            }

            $route = $request->route();

            if ($route instanceof Route) {
                if (in_array($route->getName(), $this->excludedNames)) {
                    return $response;
                }
            }

            throw new HttpException(503);
        }

        return $next($request);
    }
}
