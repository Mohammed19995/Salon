<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ForgetPasswordRequest;
use App\Http\Requests\Api\User\ResetPasswordRequest;
use App\Models\User;
use App\Repository\UserRepository;
use App\Traits\ConfirmAccountTrait;
use DB;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ConfirmAccountTrait;
    public $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        parent::__construct();
        $this->user_repository = $user_repository;
    }


    public function forgetPassword(ForgetPasswordRequest $request) {
        $user = User::where('phone' ,'=' , $request->phone)->where('phone_code' , '=' , $request->phone_code)->first();
        $code = $this->generate_code();
        $user->update(['reset_password_code' => $code]);
        // send code
        $this->sendVerificationCode($user , 2);
        return responseJson(true , trans('msg.code_send_success') , [] , 200);
    }
    public function confirmResetCode(ForgetPasswordRequest $request) {

        $code = $request->code;
        $user = User::where('phone' ,'=' , $request->phone)->where('phone_code' , '=' , $request->phone_code)->first();

        if($user->code != $code) {
            return responseJson(false ,trans('error.wrong_code') , [] , 422);
        }
        $user->tokens()->delete();
        $token = $user->createToken('My Token' , ['*'] , $request->fcm_token)->plainTextToken;
        $user->update(['reset_password_code' => null]);
        return responseJson(true ,trans('msg.success_reset_code'),['token' => $token , 'is_verified' => !is_null($user->verified_at)],200);
    }
    public function resetPassword(ResetPasswordRequest $request) {
        $user = $request->user;
        $user->password = bcrypt($request->password);
        $user->update();

        return  responseJson(true , trans('msg.reset_password_success') , [] , 200);

    }

}
