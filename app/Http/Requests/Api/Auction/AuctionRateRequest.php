<?php

namespace App\Http\Requests\Api\Auction;

use App\Http\Requests\BaseApiRequest;

use App\Traits\Rule\CustomValidationRulesTrait;
use Illuminate\Validation\Rule;

class AuctionRateRequest extends BaseApiRequest
{
    use CustomValidationRulesTrait;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'auction_id'  => ['required' ,Rule::exists('auctions' , 'id')->whereNull('deleted_at')],
            'rate'        => ['required' , 'integer' , 'gt:0']
        ];

    }
}
