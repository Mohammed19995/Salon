<?php

namespace App\Http\Middleware;

use App\Models\CartSession;
use App\Models\UserShipping;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class MergeUserMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            if($user->status != 1) {
                return responseJson(false ,trans('error.your_account_is_not_active') , [] , 422);
            }
        }else {
            $user = null;
        }
        $request->merge(['user' => $user]);
        return $next($request);
    }
}
