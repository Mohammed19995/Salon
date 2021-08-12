<?php

namespace App\Http\Requests\Admin\SalonBranch;

use App\Http\Requests\BaseRequest;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Validation\Rule;

class UpdateSalonBranchRequest extends BaseRequest
{
    use MultiLangValidationTrait;

    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {
        $data = parent::all(null);
        $data['id'] = optional($this->route('salon_branch'))->id;
        $data = array_merge($data, $this->getLangData(['name']));
        return $data;
    }

    public function rules()
    {
        return [
            'id'               => ['required', Rule::exists('salon_branches', 'id')->whereNull('deleted_at')],
            'name.*'           => ['required'],
        ];
    }


}
