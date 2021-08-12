<?php

namespace App\Http\Requests\Admin\Setting;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Validation\Rule;

use App\Models\Nationality;

class SettingRequest extends BaseRequest
{
    use MultiLangValidationTrait;

    public $data;
    public function authorize()
    {
        return true;
    }


    public function all($keys = null)
    {
        $data = parent::all(null);
        $data = array_merge($data ,$this->getLangData(['place','phone','email','facebook','twitter',
            'instagram','snapchat', 'privacy_policy' ,'about_us' ,'about_app' ]));
        return $data;
    }

    public function rules()
    {
        return [
            'place.*'           => ['required'] ,
            'phone.*'           => ['required'] ,
            'email.*'           => ['required'] ,
            'facebook.*'        => ['required'] ,
            'twitter.*'         => ['required'] ,
            'instagram.*'       => ['required'] ,
            'snapchat.*'        => ['required'] ,
            'privacy_policy.*'  => ['required'] ,
            'prevented_goods.*' => ['required'] ,
            'about_us.*'        => ['required'] ,
            'about_app.*'       => ['required'] ,
            'app_ratio.*'       => ['required' , 'numeric' , 'gte:0'] ,
        ];
    }


}
