<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 9/8/2019
 * Time: 11:29 م
 */

namespace App\Repository;



// models
use App\Facades\FileFacade;
use App\Traits\ConfirmAccountTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class UserRepository
{
    use ConfirmAccountTrait;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __call($name, $arguments)
    {
        return $this->user->$name(...$arguments);
    }


    public function add($request) {
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, null, null , true);
        $data['password'] = bcrypt($request->password);
        $user = $this->user->create($data);
        if($request->type == 2) {
            $user->categories()->sync($request->category_ids);
            $user->working_times()->createMany($request->working_times);
        }
        return $user;
    }

    public function update($request , $user) {
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image,$user, 'image_id' , false);
        if($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }else {
            unset($data['password']);
        }

        $user->update($data);
        if($request->type == 2) {
            $user->categories()->sync($request->category_ids);
            foreach ($request->working_times as $working_time) {
                $user->working_times()->updateOrCreate(
                    ['user_id' => $user->id , 'day_id' => $working_time['day_id']],
                    $working_time
                );
            }
        }
    }


    // confirm account
    public function confirmAccount(Request $request) {

        $code = $request->code;
        $user = $request->user;

        if($user->expire_verified_at < Carbon::now()) {
            $this->resendCode($user);
            return responseJson(false ,trans('error.expire_verified') , [] , 422);
        }

        if($user->code != $code) {
            return responseJson(false ,trans('error.wrong_code') , [] , 422);
        }
        $data = [
            'verified_at' => Carbon::now(),
        ];
        $user->update($data);
        return responseJson(true ,trans('msg.success_verified'),[],200);
    }
    public function resendCode($user) {
        $user->update([
            'verified_at' => null ,
            'code' => $this->generate_code() ,
            'expire_verified_at' => $this->getExpireVerifiedAt()
        ]);
        $this->sendVerificationCode($user);
    }

}
