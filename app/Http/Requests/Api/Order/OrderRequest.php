<?php

namespace App\Http\Requests\Api\Order;

use App\Http\Requests\BaseApiRequest;

use App\Traits\Rule\CustomValidationRulesTrait;
use Illuminate\Validation\Rule;

class OrderRequest extends BaseApiRequest
{
    use CustomValidationRulesTrait;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'price'                 => ['required' ,'numeric' , 'min:1'],
            'payment_method_id'    => ['required' ,Rule::exists('payment_methods' , 'id')->whereNull('deleted_at')],
        ];

    }
}
