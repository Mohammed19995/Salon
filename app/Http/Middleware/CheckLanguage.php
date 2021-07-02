<?php

namespace App\Http\Middleware;

use Closure;

class CheckLanguage
{

    public function handle($request, Closure $next)
    {
        $language = $request->header('Accept-Language');
        if($language) {
            app()->setLocale($language);
        }else {
            app()->setLocale('en');
        }

//        if(auth()->guard('api')->check() && auth()->guard('api')->user()->lang != app()->getLocale()) {
//            $user = auth()->guard('api')->user();
//            $user->lang = app()->getLocale();
//            $user->update();
//        }
        return $next($request);
    }
}
