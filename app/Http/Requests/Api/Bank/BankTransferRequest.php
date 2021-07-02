<?php

namespace App\Http\Requests\Api\Bank;

use App\Http\Requests\BaseApiRequest;
use App\Rules\CheckImageRule;
use App\Traits\Rule\RuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Traits\Rule\CustomValidationRulesTrait;

class BankTransferRequest extends BaseApiRequest
{
    use CustomValidationRulesTrait;
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'username'           => ['required'],
            'name'               => ['required'],
            'bank_id'            => ['required' , $this->checkExistsWithActive('banks' , 'id')],
            'order_id'           => ['required' , Rule::exists('orders' , 'id')],
            'price'              => ['required' ,'numeric' ,'min:1'],
            'transfer_date'      => ['required' , 'date_format:Y-m-d H:i'],
            'phone_code'         => ['required', Rule::exists('countries', 'phone_code')],
            'phone'              => ['required', 'digits_between:6,13'],
            'note'               => ['sometimes' , 'nullable'],
            'image'              => ['sometimes' , 'nullable' ,'file' , new CheckImageRule()],


        ];

    }
}
