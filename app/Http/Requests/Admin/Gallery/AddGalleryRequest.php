<?php

namespace App\Http\Requests\Admin\Gallery;

use App\Http\Requests\BaseRequest;
use App\Rules\CheckImageRule;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddGalleryRequest extends BaseRequest
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
        if($this->request->get('name')) {
            $data = array_merge($data ,$this->getLangData(['name']));
        }
        return $data;
    }

    public function rules()
    {
        return [
            'name.*'  => ['sometimes' , 'nullable'] ,
            'type_id' => ['required' , Rule::exists('gallery_types' , 'id')],
            'src'     => ['required']
        ];
    }
}
