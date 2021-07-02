<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\ConfirmAccountTrait;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;

class AuthController extends HomeController
{
    use ThrottlesLogins,ConfirmAccountTrait;

    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout' , 'show_confirm_account','confirm_account'] );
        parent::__construct();
    }

    // login
    public function show_login() {
        return view('admin.auth.login', parent::$data);
    }
    public function login(LoginRequest $request) {

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return responseJson(false ,trans('admin.too_many_login_attempts' , ['minute' => $this->decayMinutes()]) , [] , 422);
        }

        if(Auth::guard('admin')->attempt($request->validated())) {
            $admin = Auth::guard('admin')->user();
            // clear login attempt
            $this->clearLoginAttempts($request);
            if($admin->status == 0) {
                Auth::guard('admin')->logout();
                return responseJson(false ,trans('error.account_not_active_please_contact_admin') , [] , 422);
            }
//            if(!$admin->is_super == 1) {
//                $admin->update([
//                    'verified_at' => null ,
//                    'code' => $this->generate_code() ,
//                    'expire_verified_at' => Carbon::now()->addSeconds(30)
//                ]);
//            }

            $redirect_url = !is_null($request->url_previous) && !empty($request->url_previous) && Str::contains($request->url_previous ,'admin') ? $request->url_previous : route('admin.index');
            return responseJson(true ,trans('admin.login_success'),['redirect_url' => $redirect_url],200);
        }else {
            // increment login attempts
            $this->incrementLoginAttempts($request);
            return responseJson(false ,trans('admin.login_failed') , [] , 422);
        }
    }



    // confirm account
    public function show_confirm_account(Request $request) {
        $admin = Auth::guard('admin')->user();
        if(!is_null($admin->verified_at)) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        return view('admin.auth.confirm_account' , parent::$data);
    }
    public function confirm_account(Request $request) {
        $code = $request->code;
        $admin = Auth::guard('admin')->user();

        if($admin->expire_verified_at < Carbon::now()) {
            $admin->update([
                'verified_at' => null ,
                'code' => $this->generate_code() ,
                'expire_verified_at' => Carbon::now()->addMinutes(15)
            ]);
            return responseJson(false ,trans('error.expire_verified') , [] , 422);
        }

        if($admin->code != $code) {
            return responseJson(false ,trans('error.wrong_code') , [] , 422);
        }
        $admin->update([
            'verified_at' => Carbon::now(),
        ]);
        $redirect_url = !is_null($request->url_previous) && !empty($request->url_previous) && Str::contains($request->url_previous ,'admin') ? $request->url_previous : route('admin.index');
        return responseJson(true ,trans('admin.success_verified'),['redirect_url' => $redirect_url],200);
    }

    // logout
    public function logout() {
        Auth::guard('admin')->logout();
      //  Auth::guard('admin')->logoutOtherDevices("123456");
        return redirect()->back();
    }


    // help
    public function username()
    {
        return 'email';
    }

}
