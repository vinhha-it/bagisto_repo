<?php

namespace Webkul\SAASCustomizer\Exceptions;

use Exception;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\PDOException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $jsonErrorMessages = [
        404 => 'Resource not found',
        403 => '403 forbidden Error',
        401 => 'Unauthenticated',
        500 => '500 Internal Server Error',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        $path = 'saas';
        
        if ($exception->getMessage() == 'domain-not-found') {
            return $this->response($path, 400, trans('saas::app.tenant.custom-errors.domain-not-found'), 'domain-not-found');
        }

        if ($exception->getMessage() == 'company-blocked-by-administrator') {
            return $this->response($path, 404, trans('saas::app.tenant.custom-errors.company-blocked-by-administrator'), 'company-blocked-by-administrator');
        }

        if ($exception->getMessage() == 'not-allowed-to-visit-this-section') {
            return $this->response($path, 400, trans('saas::app.tenant.custom-errors.not-allowed-to-visit-this-section'), 'not-allowed-to-visit-this-section');
        }

        if ($exception->getMessage() == 'illegal-action') {
            return $this->response($path, 400, trans('saas::app.tenant.custom-errors.illegal-action'), 'illegal-action');
        }

        if (
            $exception->getMessage() == 'invalid_admin_login' 
            || $exception->getMessage() == 'invalid_customer_login'
        ) {
            return $this->response($path, 401, trans('saas::app.tenant.custom-errors.auth'));
        }

        if ($exception instanceof HttpException) {
            $statusCode = in_array($exception->getStatusCode(), [401, 403, 404, 503]) ? $exception->getStatusCode() : 500;

            return $this->response($path, $statusCode);
        } else if ($exception instanceof ModelNotFoundException) {
            return $this->response($path, 404);
        } else if ($exception instanceof PDOException) {
            return $this->response($path, 500);
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => $this->jsonErrorMessages[401]], 401);
        }

        return redirect()->guest(route('super.session.create'));
    }

    private function isAdminUri()
    {
        return strpos($_SERVER['REQUEST_URI'], 'super') !== false ? true : false;
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
        } else {
            return response()->view("{$path}::errors.{$type}", ['message' => $message, 'status' => $statusCode], $statusCode);
        }
    }
}