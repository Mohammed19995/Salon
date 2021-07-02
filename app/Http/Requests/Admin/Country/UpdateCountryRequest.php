<?php

namespace App\Http\Requests\Admin\Country;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends BaseRequest
{
    use MultiLangValidationTrait;
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
        $data = array_merge($data ,$this->getLangData(['name']));
        return $data;
    }

    public function rules()
    {
        return [
            'name.*'              => ['required'] ,
        ];
    }
}
