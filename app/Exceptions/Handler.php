<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function render($request, Throwable $exception)
    {

        if($request->wantsJson() && $exception instanceof ModelNotFoundException) {
            return responseJson(false ,trans('model not found') , [] , 404);
        }
        if($request->wantsJson() && $exception instanceof AuthorizationException) {
            return responseJson(false, trans('admin.no_auth') , [] , 403);
        }
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return responseJson(false ,trans('error.unauthenticated') , [] , 401);
        }

        $guard = Arr::get($exception->guards(), 0);
        switch ($guard) {
            case 'admin':
                $login = 'admin.auth.login';
                break;
            default:
                $login = 'website.auth';
                break;
        }
        return redirect()->guest(route($login));
    }
}
