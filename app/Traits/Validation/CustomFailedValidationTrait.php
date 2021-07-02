<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait CustomFailedValidationTrait
{

    protected function failedValidation(Validator $validator)
    {
        $response = responseJson(false , $validator->errors()->first() , [] , 422);
        throw new ValidationException($validator ,$response);
    }
}