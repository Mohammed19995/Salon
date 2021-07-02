<?php

namespace App\Http\Requests\Admin\Notification;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Validation\Rule;

class AddNotificationRequest extends BaseRequest
{
    use MultiLangValidationTrait;

    public function authorize()
    {
        return true;
    }


    public function all($keys = null)
    {

        $data = parent::all(null);
        $data = array_merge($data ,$this->getLangData(['title' , 'message']));
        $data['users'] = json_decode($data['users']);
        return $data;
    }

    public function rules()
    {
        return [
            'title.*'           => ['required'] ,
            'message.*'         => ['required'] ,
            'type'              => ['required'],
            'status'            => ['required'],
            'phone_status'      => ['required'],
            'country_id'        => ['required'],
            'city_id'           => ['required'],
            'filter'            => ['required'],
            'users.*'           => ['sometimes'],

        ];
    }

}
