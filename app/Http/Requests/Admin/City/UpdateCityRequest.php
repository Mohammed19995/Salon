<?php

namespace App\Http\Requests\Admin\City;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Validation\Rule;

class UpdateCityRequest extends BaseRequest
{
    use MultiLangValidationTrait;

    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {
        $data = parent::all(null);
        $data['id'] = optional($this->route('city'))->id;
        $data = array_merge($data, $this->getLangData(['name']));
        return $data;
    }

    public function rules()
    {
        return [
            'id'               => ['required', Rule::exists('cities', 'id')->whereNull('deleted_at')],
            'name.*'           => ['required'],
            'country_id'       => ['required' , Rule::exists('countries', 'id')->whereNull('deleted_at')],
        ];
    }


}
