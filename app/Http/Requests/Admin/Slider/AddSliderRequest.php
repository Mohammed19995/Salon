<?php

namespace App\Http\Requests\Admin\Slider;

use App\Http\Requests\BaseRequest;
use App\Traits\Rule\CustomValidationRulesTrait;
use App\Traits\Validation\MultiLangValidationTrait;

class AddSliderRequest extends BaseRequest
{
    use MultiLangValidationTrait , CustomValidationRulesTrait;
    public function authorize()
    {
        return true;
    }


    public function all($keys = null)
    {

        $data = parent::all(null);
        $data = array_merge($data ,$this->getLangData(['name','description']));
        return $data;
    }

    public function rules()
    {
        return [
            'name.*'           => ['required'] ,
            'description.*'    => ['required'] ,
        ];
    }

}
