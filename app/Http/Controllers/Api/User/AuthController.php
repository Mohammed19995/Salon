<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

// request
use Illuminate\Http\Request;
use App\Http\Requests\Api\User\LoginUserRequest;
use App\Http\Requests\Api\User\RegisterUserRequest;
use App\Http\Requests\Api\User\RegisterUserSecondStepRequest;
// models
use App\Models\User;

// support
use Illuminate\Support\Facades\Hash;
use DB;
// traits
use App\Traits\ConfirmAccountTrait;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Traits\Controller\RegisterDataTrait;
// Resources
use App\Http\Resources\User\UserResource;


//Repository
use App\Repository\UserRepository;

class AuthController extends Controller
{
    use ThrottlesLogins , ConfirmAccountTrait , RegisterDataTrait;

    public $user_repository;
    public function __construct(UserRepository $user_repository)
    {
       // parent::__construct();
        $this->user_repository = $user_repository;

    }
    // login
    public function login(LoginUserRequest $request) {

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return responseJson(false ,trans('admin.too_many_login_attempts' , ['minute' => $this->decayMinutes()]) , [] , 422);
        }

        $user = User::where('phone' ,'=' , $request->phone)->where('phone_code' , '=' , $request->phone_code)->first();
        if(Hash::check($request->password, $user->password)) {

            // clear login attempt
            $this->clearLoginAttempts($request);

            // check status of user
            if($user->type == 2 && is_null($user->verified_at)) {
                return responseJson(false ,trans('error.your_account_is_not_confirmed') , [] , 422);
            }
            if($user->status != 1) {
                return responseJson(false ,trans('error.your_account_is_not_active') , [] , 422);
            }
            $this->removeTokens($user);
            $token = $user->createToken('My Token' , ['*'] , $request->fcm_token)->plainTextToken;

            return  responseJson(true , trans('msg.success_login') , [ 'token' => $token,'type' => $user->type ,'is_verified' => !is_null($user->verified_at) ] , 200);

        }else {
            $this->incrementLoginAttempts($request);
            return  responseJson(false , trans('error.wrong_password') , [] , 422);
        }
    }

    // register
    public function registerData() {
        return responseJson(true ,trans('msg.done'), $this->getRegisterData(),200);
    }
    public function register(RegisterUserRequest $request) {
        $user = $this->user_repository->add($request);
        $token = $user->createToken('My Token' , ['*'] , $request->fcm_token)->plainTextToken;
        $this->user_repository->resendCode($user);
        return  responseJson(true , trans('msg.success_login') , ['token' => $token , 'is_verified' => !is_null($user->verified_at)] , 200);
    }

    // logout
    public function logout(Request $request) {
        $user = $request->user;
        $this->removeTokens($user);
        return  responseJson(true , trans('msg.success_logout') , [] , 200);

    }

    // help methods
    public function username() {
        return "phone";
    }

    public function removeTokens($user) {
        $user->tokens()->delete();
    }
}
