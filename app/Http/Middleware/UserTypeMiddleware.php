<?php

namespace App\Http\Middleware;

use App\Models\CartSession;
use App\Models\UserShipping;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserTypeMiddleware
{

    public function handle($request, Closure $next , $data)
    {
        if($request->user->type != $data) {
            return responseJson(false ,trans('error.no_auth') , [] , 422);
        }
        return $next($request);
    }
}
