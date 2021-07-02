<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;

class AddCategoryRequest extends BaseRequest
{
    use MultiLangValidationTrait;

    public function authorize()
    {
        return true;
    }


    public function all($keys = null)
    {

        $data = parent::all(null);
        $data = array_merge($data ,$this->getLangData(['name' , 'description']));
        return $data;
    }

    public function rules()
    {
        $rules = [
            'name.*'           => ['required'] ,
            'description.*'    => ['required'] ,
            'parent_id'        => ['required'],
        ];
        if($this->request->get('parent_id') != -1) {
            $rules['service_time'] = ['required','integer','gt:0'];
        }
        return $rules;
    }

}
