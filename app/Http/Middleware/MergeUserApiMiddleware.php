<?php

namespace App\Http\Middleware;

use App\Models\UserShipping;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class MergeUserApiMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
        }else {
            $user = null;
        }
        $request->merge(['user' => $user]);
        return $next($request);
    }
}
