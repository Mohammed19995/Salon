<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\Controller\PermissionKeyWithController;

class ExecuteOptionRequest extends BaseRequest
{
    use PermissionKeyWithController;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $get_controller = (string)Str::of(request()->route()->getActionName())->replace('@executeOptions', '');
        $admin = Auth::guard('admin')->user();
        if (($admin->is_super == 1 || $admin->hasPermissions($this->getKeyWithNumberOption($this->request->get('option_id'))."_".$this->getPermissionKeyWithController($get_controller)))) {
            return true;
        }else {
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (is_null($this->request->get('option_id')) || $this->request->get('option_id') == -1) {
                $validator->errors()->add('option_id', trans('admin.pleas_select_option'));
            }
            if (is_array($this->request->get('ids')) && count($this->request->get('ids')) <= 0) {
                $validator->errors()->add('option_id', trans('admin.pleas_select_record'));
            }

        });
    }


}
