<?php

namespace App\Http\Requests\Admin\Service;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Validation\Rule;

class AddServiceRequest extends BaseRequest
{
    use MultiLangValidationTrait;

    public $get_data;
    public function authorize()
    {
        return true;
    }


    public function all($keys = null)
    {
        $data = parent::all(null);

        $data = array_merge($data ,$this->getLangData(['name' , 'benefit_section' , 'requirements' ,'description' ,'procedures','agreement_level' ,'files']));
        $data['id'] = optional($this->route('service'))->id;
        $data['show_crime_form'] = 0;
        $data['user_type_ids'] = !empty($data['user_type_ids']) ?explode("," , $data['user_type_ids']) : [];
        return $data;
    }

    public function rules()
    {
        $rules = [
            'name.*'                => ['required'] ,
            'benefit_section.*'     => ['required'] ,
            'requirements.*'        => ['required'] ,
            'description.*'         => ['required'] ,
            'procedures.*'          => ['required'] ,
            'agreement_level.*'     => ['required'] ,
            'show_complaint_form'   => ['required' , 'in:0,1'] ,
            'show_crime_form'       => ['required' , 'in:0,1'] ,
            'user_type_ids'         => ['sometimes'] ,
            'form_id'               => ['required' ,Rule::exists('forms','id')->whereNull('deleted_at')] ,
        ];
        if($this->get('id')) {
            $rules['files.*'] = ['sometimes'];
        }else {
            $rules['files.*'] = ['required'];
        }
        return $rules;
    }

}
