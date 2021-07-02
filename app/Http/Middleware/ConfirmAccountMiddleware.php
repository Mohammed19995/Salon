<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class ConfirmAccountMiddleware
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
        $admin = Auth::guard('admin')->user();
        if(is_null($admin->verified_at)) {
            return redirect(RouteServiceProvider::ADMIN_CONFIRM_ACCOUNT);
        }
        return $next($request);
    }
}
