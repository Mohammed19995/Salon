<?php

namespace App\Http\Middleware;

use App\Models\CartSession;
use App\Models\UserShipping;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatusApiMiddleware
{

    public function handle($request, Closure $next)
    {
        $user = $request->user;
        if($user->status != 1) {
            return responseJson(false ,trans('error.your_account_is_not_active') , [] , 422);
        }

        return $next($request);
    }
}
