<?php

namespace App\Http\Resources\Auction;

use App\Traits\Resource\Auction\AuctionDataTrait;
use Illuminate\Http\Resources\Json\JsonResource;


class AuctionUserPriceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id ,
            'name'              => $this->name ,
            'price'             => $this->price ,
            'auction_price'     => $this->auction_price ,
            'currency'          => getCurrency(),

        ];
    }

}
