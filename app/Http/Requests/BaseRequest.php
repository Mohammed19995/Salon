<?php

namespace App\Http\Requests;

use App\Traits\Validation\CustomAdminFailedValidationTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    use CustomAdminFailedValidationTrait;

    protected function failedAuthorization()
    {
        throw new AuthorizationException(trans('admin.no_auth'));
    }
}
