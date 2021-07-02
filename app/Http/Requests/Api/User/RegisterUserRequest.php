<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\BaseApiRequest;
use App\Traits\Rule\CustomValidationRulesTrait;
use App\Traits\Rule\RuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends BaseApiRequest
{
    use CustomValidationRulesTrait , RuleTrait;

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $check_phone = $this->checkPhone('users',true , -1 , $this->request->get('phone_code') , $this->request->get('phone'));
        return [
            'name'       => ['required' , 'max:255'] ,
            'password'   => 'required' ,
            'phone'      => ['required'  ,$check_phone],
            'phone_code' => ['required'],
            'email'      => ['nullable' ,'email'  ,$this->checkUniqueWithActive('users' , 'email')],
            'city_id'    => ['required' , $this->checkExistsWithActive('cities' , 'id')],
        ];

    }
}
