<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
class CheckRoleMiddleware
{

    public function handle($request, Closure $next , $roles)
    {

        $admin = Auth::guard('admin')->user();

        if(Auth::guard('admin')->check() && ($admin->is_super == 1 || $admin->hasPermissions($roles))) {
            return $next($request);
        }else {
            if($request->ajax() || $request->wantsJson()) {
                return responseJson(false, trans('admin.no_auth'), [], 401);
            }else {
                return redirect('admin');
            }
        }



    }



}
