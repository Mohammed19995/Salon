<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\UpdateAdminRequest;
use App\Http\Requests\Admin\Profile\ChangePasswordRequest;
use App\Http\Requests\Admin\Profile\ProfileRequest;
use App\Models\Country;
use Illuminate\Http\Request;

// facades
use App\Facades\FileFacade;
use Illuminate\Support\Facades\Auth;

class ProfileController extends HomeController
{
    public function __construct()
    {
        parent::__construct();

        self::$data['main_title'] = trans('admin.my_profile');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home') , 'url' => url('admin')] ,
            ['name' => trans('admin.my_profile') , 'url' => route('admin.profile')] ,
        ];
    }

    
    // profile
    public function index() {
        parent::$data['countries'] = Country::Active()->get();
        return view('admin.profile.index' , parent::$data);
    }
    public function update(UpdateAdminRequest $request) {
        $data = $request->validated();
        $admin = Auth::guard('admin')->user();
        $data['image_id'] = FileFacade::storeFileId($request->image, $admin, 'image_id' , false);
        $data['role_id'] = $data['role_id'] == "null" ? null : $data['role_id'];
        $admin->update($data);
        return responseJson(true ,trans('admin.update_success') , [
            'admin' => $admin->load('get_image')
        ] , 200);
    }

    // change password
    public function change_password(ChangePasswordRequest $request) {
        $data = $request->validated();
        $admin = Auth::guard('admin')->user();
        $admin->update([
            'password' =>  bcrypt($data['new_password']) ,
        ]);
        return responseJson(true ,trans('admin.update_success') , [] , 200);
    }
}

