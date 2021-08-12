<?php

namespace App\Http\Requests\Admin\SalonBranch;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Validation\Rule;

class AddSalonBranchRequest extends BaseRequest
{
    use MultiLangValidationTrait;

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
            'name.*'           => ['required'] ,
        ];
    }

}
