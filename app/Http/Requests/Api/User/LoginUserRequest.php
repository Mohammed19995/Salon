<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\BaseApiRequest;
use App\Traits\Rule\RuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginUserRequest extends BaseApiRequest
{
    use RuleTrait;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $check_phone = $this->checkExistPhone('users' , $this->request->get('phone_code') , $this->request->get('phone'));
        return [
            'phone_code'   => ['required'] ,
            'phone'        => ['required' , $check_phone] ,
            'password'     => 'required' ,
        ];

    }
}
