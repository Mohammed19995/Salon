<?php

namespace App\Http\Requests\Admin\Profile;

use App\Http\Requests\BaseRequest;
use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'new_password' => ['required'],
            'confirmation_new_password' => ['required', 'same:new_password'],
        ];
    }

    public function withValidator($validator)
    {
        $admin = Admin::find($this->request->get('id'));
        $validator->after(function ($validator) use($admin) {
            if (!Hash::check( $this->request->get('old_password'), $admin->password)) {
                $validator->errors()->add('old_password', trans('admin.wrong_old_password'));
            }
        });
    }
}
