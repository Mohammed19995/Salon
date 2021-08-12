<?php

namespace App\Http\Requests\Admin\Salon;

use App\Http\Requests\BaseRequest;
use App\Traits\Rule\CustomValidationRulesTrait;
use App\Traits\Rule\RuleTrait;
use App\Traits\Validation\MultiLangValidationTrait;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class UpdateSalonRequest extends BaseRequest
{
    use MultiLangValidationTrait , CustomValidationRulesTrait , RuleTrait;

    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {
        $data = parent::all(null);
        $data['id'] = optional($this->route('salon'))->id;
        $data = array_merge($data ,$this->getLangData(['name','description','address']));
        $data['working_times'] = json_decode(  $data['working_times'], true);
        $data['category_ids'] = json_decode(  $data['category_ids'], true);
        if(isset($data['employee_ids'])) $data['employee_ids'] = json_decode(  $data['employee_ids'], true);

        for ($i = 0 ; $i < count($data['working_times']) ; $i++) {
            $data['working_times'][$i]['start_at'] = Carbon::createFromFormat('h:i A' ,$data['working_times'][$i]['start'] )->format('H:i');
            $data['working_times'][$i]['end_at'] = Carbon::createFromFormat('h:i A' ,$data['working_times'][$i]['end'] )->format('H:i');
            unset($data['working_times'][$i]['start']);
            unset($data['working_times'][$i]['end']);

        }
        return $data;
    }

    public function rules()
    {
        return [
            'id'                        => ['required', Rule::exists('salons', 'id')->whereNull('deleted_at')],
            'name.*'                    => ['required'] ,
            'description.*'             => ['required'] ,
            'address.*'                 => ['required'] ,
            'branch_id'                 => ['required' , $this->checkExistsWithActive('salon_branches','id')],
            'category_ids.*'            => ['required' , $this->checkExistsWithActive('categories','id')],
            'employee_ids'              => ['required'],
            'employee_ids.*'            => ['required' , $this->checkExistsWithActive('users','id')],
            'working_times.*'           => ['required' ],
            'working_times.*.start_at'  => ['required' ],
            'working_times.*.end_at'    => ['required' ],
            'email'                     => ['required', 'email', 'max:250', Rule::unique('users', 'email')->whereNull('deleted_at')],
            'phone_code'                => ['required', Rule::exists('countries', 'phone_code')],
            'phone'                     => ['required', 'digits_between:6,13'],
            'city_id'                   => ['required' , $this->checkExistsWithActive('cities' , 'id')],

        ];
    }


}
