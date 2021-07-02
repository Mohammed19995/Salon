<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\BaseApiRequest;
use App\Traits\Rule\CustomValidationRulesTrait;
use App\Traits\Rule\RuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends BaseApiRequest
{
    use CustomValidationRulesTrait , RuleTrait;

    public $data;
    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {

        $data = parent::all(null);
        $data['user_id'] = getUser($this->request->get('user'))->id;
        $this->data = $data;
        return $data;
    }

    public function rules()
    {
        return [
            'name'       => ['required' , 'max:255'] ,
            'password'   => ['sometimes', 'nullable' , 'min:6'] ,
            'email'      => ['required' ,'email'  ,$this->checkUniqueIgnoreWithActive('users' , 'email' , $this->data['user_id'], 'id',false)],
            'city_id'    => $this->checkCity()
        ];

    }
    public function checkCity() {
        $validations = ['sometimes' , 'nullable'];
        if(!is_null($this->request->get('city_id')) && !empty($this->request->get('city_id'))) {
            $validations[] = $this->checkExistsWithActive('cities' , 'id');
        }
        return $validations;
    }
}
