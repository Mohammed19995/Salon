<?php

namespace App\Http\Resources\Auction;

use App\Http\Resources\General\GalleryDataResource;
use App\Traits\Resource\Auction\AuctionDataTrait;
use Illuminate\Http\Resources\Json\JsonResource;


class AuctionDetailsResource extends JsonResource
{
    use AuctionDataTrait;
    public function toArray($request)
    {
        $data = $this->getData();
        $detailsData = [
            'initial_price'   => $this->initial_price,
            'current_price'   => $this->current_price,
            'currency'        => getCurrency(),
            'files'           => GalleryDataResource::collection($this->images),
            'prices'          => array_map( 'floatval', explode(',' , $this->auction_prices)) ,
            'user_prices'     => AuctionUserPriceResource::collection($this->prices),
            'is_subscription' => $this->prices_count > 0
        ];
        return array_merge($data , $detailsData);
    }

}
