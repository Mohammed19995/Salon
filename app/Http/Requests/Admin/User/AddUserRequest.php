<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest;
use App\Traits\Rule\CustomValidationRulesTrait;
use App\Traits\Rule\RuleTrait;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddUserRequest extends BaseRequest
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
        if($data['type'] == 2) {
            $data['working_times'] = json_decode(  $data['working_times'], true);
            $data['category_ids'] = json_decode(  $data['category_ids'], true);
            for ($i = 0 ; $i < count($data['working_times']) ; $i++) {
                $data['working_times'][$i]['start'] = Carbon::createFromFormat('h:i A' ,$data['working_times'][$i]['start'] )->format('H:i');
                $data['working_times'][$i]['end'] = Carbon::createFromFormat('h:i A' ,$data['working_times'][$i]['end'] )->format('H:i');

            }
        }
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $check_phone = $this->checkPhone('users',true , -1 , $this->request->get('phone_code') , $this->request->get('phone'));
//        $check_admin_phone = $this->checkPhone('admins',true , -1 , $this->request->get('phone_code') , $this->request->get('phone'));

        $rules = [
            'name'       => ['required', 'max:250'],
            'email'      => ['required', 'email', 'max:250', Rule::unique('users', 'email')->whereNull('deleted_at')],
            'phone_code' => ['required', Rule::exists('countries', 'phone_code')],

            'phone'      => ['required', 'digits_between:6,13',$check_phone],
            'password'   => ['required', 'max:250'],
            'city_id'    => ['required' , $this->checkExistsWithActive('cities' , 'id')],
            'type'       => ['required' , 'in:1,2']
        ];
        if($this->request->get('type') == 2) {
            $rules['category_ids.*']        = ['required' , $this->checkExistsWithActive('categories','id')];
            $rules['working_times.*']       = ['required'];
            $rules['working_times.*.start']   = ['required'];
            $rules['working_times.*.end']     = ['required'];

        }
        return $rules;
    }
}
