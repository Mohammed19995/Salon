<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

// request
use Illuminate\Http\Request;

// models
use App\Models\User;

// support
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
// traits
use App\Traits\ConfirmAccountTrait;
// Resources
use App\Http\Resources\User\UserResource;

//Repository
use App\Repository\UserRepository;

class ConfirmAccountController extends Controller
{
    use ConfirmAccountTrait;

    public $user_repository;
    public function __construct(UserRepository $user_repository)
    {
        parent::__construct();
        $this->user_repository = $user_repository;

    }
    public function confirmAccount(Request $request) {
        return $this->user_repository->confirmAccount($request);
    }
    public function resendCode(Request $request) {
        $this->user_repository->resendCode($request->user);
        return responseJson(true ,trans('msg.code_send_success'),[],200);
    }
    public function approvePolicy(Request $request) {
        return $this->user_repository->approvePolicy($request);
    }

    public function activateAccount(Request $request) {
        $user = $request->user;
        $data = [
            'verified_at' => Carbon::now(),
        ];
        $user->update($data);
        return responseJson(true ,trans('msg.success_verified'),[],200);
    }
}
