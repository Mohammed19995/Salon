<?php

namespace App\Http\Resources\Auction;

use App\Traits\Resource\Auction\AuctionDataTrait;
use Illuminate\Http\Resources\Json\JsonResource;


class AuctionResource extends JsonResource
{
    use AuctionDataTrait;
    public function toArray($request)
    {
        return $this->getData();
    }

}
