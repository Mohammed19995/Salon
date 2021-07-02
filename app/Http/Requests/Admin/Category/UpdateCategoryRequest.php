<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends BaseRequest
{
    use MultiLangValidationTrait;

    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {
        $data = parent::all(null);
        $data['id'] = optional($this->route('category'))->id;
        $data = array_merge($data, $this->getLangData(['name', 'description']));
        return $data;
    }

    public function rules()
    {
        $rules = [
            'id' => ['required', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'name.*' => ['required'],
            'description.*' => ['required'],
            'parent_id' => ['required'],
        ];
        if($this->request->get('parent_id') != -1) {
            $rules['service_time'] = ['required','integer','gt:0'];
        }
        return $rules;

    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->get('parent_id') == $this->get('id')) {
                $validator->errors()->add('parent_id', trans('error.parent_category_cant_same_category'));
            }
        });
    }


}
