<?php

namespace App\Http\Middleware;

use App\Models\CartSession;
use App\Models\UserShipping;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatusAdminMiddleware
{

    public function handle($request, Closure $next)
    {
        $admin = Auth::guard('admin')->user();
        if($admin->status != 1) {
            if($request->wantsJson()) {
                return responseJson(false ,trans('error.your_account_is_not_active') , [] , 422);
            }else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.auth.login');
            }
        }
        return $next($request);
    }
}
