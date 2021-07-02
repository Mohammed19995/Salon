<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Resource\Auction;

use App\Http\Resources\General\SimpleDataResource;
use Carbon\Carbon;

trait AuctionDataTrait
{

    public function getData() {
        return [
            'id'          => $this->id,
            'name'        => $this->name ,
            'description' => $this->description,
            'image'       => $this->image ,
            'address'     => $this->city->country->name . ' - ' . $this->city->name ,
            'type'        => $this->type ,
            'type_text'   => auctionTypeData()[$this->type]['text'] ,
            'status'      => $this->status ,
            'status_text' => auctionStatusData()[$this->status]['text'] ,
            'lat'         => $this->lat ,
            'lng'         => $this->lng ,
            'start_date'  => $this->start_date ,
            'owner_room'  => new SimpleDataResource($this->owner_room),
            'buyer'       => new SimpleDataResource($this->buyer),
            'rate'        => round($this->average_rating , 2),
            'in_favorite' => $this->favorites_count > 0
        ];
    }


}