<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\NotificationTrait;
use App\Traits\Resource\Auction\AuctionDataTrait;


class NotificationResource extends JsonResource
{
    use NotificationTrait;

    public function toArray($request)
    {
        $_data_ = $this->data;
        $_data_['auction_name'] = $this->auction ?  $this->auction->name : "" ;
        $_data_['reject_reason'] = $this->auction ?  $this->auction->reject_reason : "" ;

        $_data_['title']            = $this->getTitleNotification($this->type,$_data_ , request()->user->lang);
        $_data_['sub_title']        = $this->getSubTitleNotification($this->type,$_data_ , request()->user->lang);
        $_data_['is_auction_open']  = isset($this->auction->type) && $this->auction->type == 1 ? true : false;
        $_data_['is_my_auction']    = $this->auction ?  $this->auction->user_id == $request->user->id : false ;
        $_data_['auction_name']     = $this->auction ?  $this->auction->name : "" ;
        $_data_['auction_image']    = $this->auction ?  $this->auction->image : "" ;
        $_data_['auction_address']  = $this->auction ?  $this->auction->city->country->name . ' - ' . $this->auction->city->name : "" ;
        $_data_['type']             = $this->auction ?  $this->auction->type : null ;
        $_data_['status']           = $this->auction ?  $this->auction->status : null ;

        unset($_data_['reject_reason']);
        unset($_data_['_title_']);
        unset($_data_['_message_']);
        unset($_data_['user_notification_id']);
        return [
            'id'         => $this->id ,
            'type'       => $this->type ,
            'data'       => $_data_ ,
            'created_at' => $this->created_at->format('Y-m-d h:i a') ,
            'read_at'    => !is_null($this->read_at) ? $this->read_at->format('Y-m-d h:i a') : null,
        ];
    }
}
