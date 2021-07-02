<?php

namespace App\Http\Controllers\Website;


use App\Http\Requests\Api\User\LoginUserRequest;
use App\Http\Requests\Api\User\RegisterUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends HomeController
{
    use ThrottlesLogins;

    public function __construct() {
        parent::__construct();
        $this->middleware('guest:web')->except(['logout'] );

    }

    public function index(Request $request) {
        return view('website.auth.auth' ,parent::$data);
    }

    // login
    public function login(Request $request) {

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return responseJson(false ,trans('error.too_many_login_attempts' , ['minute' => $this->decayMinutes()]) , [] , 422);
        }
        if(Auth::guard('web')->attempt([$this->username() => $request->username , 'password' => $request->password ])) {
            // clear login attempt
            $this->clearLoginAttempts($request);
            return  responseJson(true , trans('msg.success_login') , [] , 201);

        }else {
            $this->incrementLoginAttempts($request);
            return  responseJson(false , trans('error.login_failed') , [] , 422);
        }
    }
    // register
    public function register(RegisterUserRequest $request) {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::guard('web')->login($user);
        return responseJson(true, trans('msg.success_login') , [] , 201);
    }

    // logout
    public function logout() {
        Auth::guard('web')->logout();
      //  \request()->session()->invalidate();
        \request()->session()->regenerateToken();
        return redirect()->route('website.auth');
    }


    // help
    public function username() {
        return "email";
    }
}
