<?php

namespace App\Http\Requests\Admin\Admin;

use App\Http\Requests\BaseRequest;
use App\Traits\Rule\CustomValidationRulesTrait;
use App\Traits\Rule\RuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddAdminRequest extends BaseRequest
{
    use RuleTrait , CustomValidationRulesTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $check_phone = $this->checkPhone('admins',true , -1 , $this->request->get('phone_code') , $this->request->get('phone'));
//        $check_user_phone = $this->checkPhone('users',true , -1 , $this->request->get('phone_code') , $this->request->get('phone'));

        $rules =  [
            'name' => ['required', 'max:250'],
            'email' => ['required', 'email', 'max:250', Rule::unique('admins', 'email')->whereNull('deleted_at')],
            'phone_code' => ['required', Rule::exists('countries', 'phone_code')],

            'phone' => ['required', 'digits_between:6,13',$check_phone],
            'password' => ['required', 'max:250'],
        ];
        if($this->request->get('role_id') != -1) {
            $rules['role_id'] = ['sometimes','nullable' , Rule::exists('roles', 'id')];
        }
        return $rules;
    }
}
