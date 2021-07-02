<?php

namespace App\Http\Requests\Api\Auction;

use App\Http\Requests\BaseApiRequest;

use App\Rules\CheckImageRule;
use App\Traits\Rule\CustomValidationRulesTrait;
use Illuminate\Validation\Rule;

class AddAuctionRequest extends BaseApiRequest
{
    public function all($keys = null)
    {

        $data = parent::all(null);
        return $data;
    }

    public function rules()
    {
        return [
            'name'                     => ['required' , 'max:250'] ,
            'display_name'             => ['required' , 'max:250'] ,
            'description'              => ['required'] ,
            'city_id'                  => ['required' , Rule::exists('cities' , 'id')->whereNull('deleted_at')],
            'phone_code'               => ['required', Rule::exists('countries', 'phone_code')],
            'phone'                    => ['required', 'digits_between:6,13'],
            'image'                    => ['required' ,'file' , new CheckImageRule()],
            'description_1'            => ['sometimes' , 'nullable'],
            'images.*'                 => ['sometimes' , 'nullable' , 'file' ],
        ];
    }
}
