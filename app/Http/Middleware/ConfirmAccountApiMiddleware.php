<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class ConfirmAccountApiMiddleware
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
        $user = $request->user;
        if(!is_null($user->verified_at)) {
            return responseJson(false ,trans('error.account_is_already_verified') , [] , 422);
        }
        return $next($request);
    }
}
