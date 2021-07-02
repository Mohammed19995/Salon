<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;

use App\Http\Resources\Category\CategoryDTFResource;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

// Requests
use App\Http\Requests\Admin\Setting\SettingRequest;

// models
use App\Models\Setting;

class SettingController extends HomeController
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware('check_role:view_setting|edit_setting', ['only' => ['index']]);
        $this->middleware('check_role:edit_setting', ['only' => ['update']]);

        self::$data['main_title'] = trans('admin.settings');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.settings'), 'url' => route('admin.settings.index')],
        ];
        self::$data['active_menu'] = 'settings';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {
        $settings = Setting::all();
        parent::$data['place'] = $settings->where('key' ,'=','place')->first();
        parent::$data['phone'] = $settings->where('key' ,'=','phone')->first();
        parent::$data['email'] = $settings->where('key' ,'=','email')->first();
        parent::$data['facebook'] = $settings->where('key' ,'=','facebook')->first();
        parent::$data['twitter'] = $settings->where('key' ,'=','twitter')->first();
        parent::$data['instagram'] = $settings->where('key' ,'=','instagram')->first();
        parent::$data['snapchat'] = $settings->where('key' ,'=','snapchat')->first();
        parent::$data['privacy_policy'] = $settings->where('key' ,'=','privacy_policy')->first();
        parent::$data['prevented_goods'] = $settings->where('key' ,'=','prevented_goods')->first();
        parent::$data['about_us'] = $settings->where('key' ,'=','about_us')->first();
        parent::$data['about_app'] = $settings->where('key' ,'=','about_app')->first();
        parent::$data['app_ratio'] = $settings->where('key' ,'=','app_ratio')->first();

        return view('admin.settings.index', parent::$data);
    }


    public function update(SettingRequest $request )
    {

        $data = $request->validated();
        foreach ($data as $key=> $value) {
            Setting::where('key' , '=' , $key)->update(
                ['value' => $value]
            );
        }
        return responseJson(true, trans('admin.update_success'), [], 200);
    }


}
