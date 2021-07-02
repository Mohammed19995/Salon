<?php

namespace App\Http\Requests\Api\Auction;

use App\Http\Requests\BaseApiRequest;

use App\Traits\Rule\CustomValidationRulesTrait;

class AuctionSubscriptionRequest extends BaseApiRequest
{
    use CustomValidationRulesTrait;
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'auction_id'  => ['required' , $this->checkExistsWithActive('auctions' , 'id')],
        ];

    }
}
