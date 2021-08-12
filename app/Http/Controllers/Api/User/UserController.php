<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ForgetPasswordRequest;
use App\Http\Requests\Api\User\UpdateProfileRequest;
use App\Http\Resources\User\UserResource;
use App\Repository\UserRepository;
use DB;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

// support

class UserController extends Controller
{
    use SendsPasswordResetEmails;

    public $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        parent::__construct();
        $this->user_repository = $user_repository;
    }

    public function profile(Request $request)
    {
        $user = getUser($request->user);
        return responseJson(true, trans('msg.done'), ['user' => new UserResource($user)], 200);

    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = getUser($request->user);
        $this->user_repository->update($request , $user);
        return responseJson(true, trans('msg.updated_profile_success'), [], 200);

    }

}
