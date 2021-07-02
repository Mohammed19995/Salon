<?php

namespace App\Http\Requests\Admin\Admin;

use App\Http\Requests\BaseRequest;
use App\Traits\Rule\CustomValidationRulesTrait;
use App\Traits\Rule\RuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends BaseRequest
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

    public function all($keys = null)
    {
        $data = parent::all(null);
        $data['role_id'] = in_array($data['role_id'] , [-1 , "null"]) ? null : $data['role_id'];

        return $data;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $check_phone = $this->checkPhone('admins',false , $this->request->get('id') , $this->request->get('phone_code') , $this->request->get('phone'));
//        $check_user_phone = $this->checkPhone('users',true , -1 , $this->request->get('phone_code') , $this->request->get('phone'));

        return [
            'name' => ['required', 'max:250'],
            'email' => ['required', 'email', 'max:250',
                Rule::unique('admins', 'email')->ignore($this->request->get('id'))
                    ->whereNull('deleted_at')
            ],
            'phone_code' => ['required', Rule::exists('countries', 'phone_code')],
            'phone' => ['required', 'digits_between:6,13',$check_phone ],

            'states'    => ['sometimes'],
            'services'  => ['sometimes'],
            'role_id'   => ['sometimes','nullable' , Rule::exists('roles', 'id')],
        ];
    }
}
