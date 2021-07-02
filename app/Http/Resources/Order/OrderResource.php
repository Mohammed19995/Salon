<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\General\SimpleDataResource;
use App\Traits\Resource\Auction\AuctionDataTrait;
use Illuminate\Http\Resources\Json\JsonResource;


class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id ,
            'price'             => $this->price ,
            'payment_method'    => new SimpleDataResource($this->payment_method),
            'status'            => orderStatusData()[$this->status]
        ];
    }

}
