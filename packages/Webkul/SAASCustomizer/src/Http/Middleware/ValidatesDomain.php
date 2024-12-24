<?php

namespace Webkul\SAASCustomizer\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;

class ValidatesDomain
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\ChannelRepository $channelRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CompanyRepository $companyRepository
     * @return void
     */
    public function __construct(
        protected ChannelRepository $channelRepository,
        protected CompanyRepository $companyRepository
    )
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
        $path = 'saas';

        $primaryServerName = config('app.url');

        $currentURL = $_SERVER['HTTP_HOST'];

        $params['domain'] = $currentURL;

        $validator = Validator::make($params, [
            'domain' => 'required|ip'
        ]);

        if (str_contains($primaryServerName, 'http://')) {
            $primaryServerNameWithoutProtocol = explode('http://', $primaryServerName)[1];
        } else if (str_contains($primaryServerName, 'https://')) {
            $primaryServerNameWithoutProtocol = explode('https://', $primaryServerName)[1];
        }

        if (! $validator->fails()) {            
            //case where IP validation passes then it should redirect to the main domain

            return redirect()->route('company.create.index');
        }

        //case where IP validation fails
        if (str_contains($currentURL, 'http://')) {
            $currentURL = explode('http://', $currentURL)[1];
        } else if (str_contains($currentURL, 'http://')) {
            $currentURL = explode('http://', $currentURL)[1];
        }

        if (str_contains($primaryServerNameWithoutProtocol, '/')) {
            $primaryServerNameWithoutProtocol = explode('/', $primaryServerNameWithoutProtocol)[0];
        }

        if ($currentURL == $primaryServerNameWithoutProtocol) {
            if (request()->is('company/*') || request()->is('super/*')) {
                $this->handleThemes();

                return $next($request);
            }

            return redirect()->route('company.create.index');
        } else {
            if ((request()->is('company/*') || request()->is('super/*')) && ! request()->is('company/seed-data')) {
                throw new \Exception('not-allowed-to-visit-this-section', 400);
            } else {
                $company = $this->companyRepository->findOneWhere(['domain' => $currentURL]);

                if (isset($company->id) && $company->is_active == 0) {
                    throw new \Exception('company-blocked-by-administrator', 400);
                }

                if (isset($company->id)) {
                    return $next($request);
                }

                $cname = explode("www.", $currentURL);
                
                if (count($cname) > 1) {
                    $company = $this->companyRepository->where('cname', $cname[1])->orWhere('cname', $currentURL)->first();
                } else {
                    $company = $this->companyRepository->findOneWhere(['cname' => $currentURL]);
                }

                if (isset($company->id)) {
                    return $next($request);
                }
                
                $channel = $this->channelRepository->findOneByField('hostname', $currentURL);

                if (isset($channel->id)) {
                    return $next($request);
                }

                return $this->response($path, 400, trans('saas::app.tenant.custom-errors.domain-not-found'), 'domain-not-found');
            }
        }
    }

    private function response($path, $statusCode, $message = null, $type = null)
    {
        if (request()->expectsJson()) {
            return response()->json([
                    'error' => isset($this->jsonErrorMessages[$statusCode])
                        ? $this->jsonErrorMessages[$statusCode]
                        : trans('saas::app.tenant.registration.something-wrong-1')
                ], $statusCode);
        }

        if ($type == null) {
            return response()->view("{$path}::errors.{$statusCode}", ['message' => $message, 'status' => $statusCode], $statusCode);
        }

        return response()->view("{$path}::errors.{$type}", ['message' => $message, 'status' => $statusCode], $statusCode);
    }

    private function handleThemes()
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
                $themes->set(config('themes.super-default'));
            }
        } else {
            $themes->set(config('themes.super-default'));
        }
    }
}