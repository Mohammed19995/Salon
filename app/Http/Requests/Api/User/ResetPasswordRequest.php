<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\BaseApiRequest;
use App\Traits\Rule\RuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends BaseApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:8',
        ];

    }
}
