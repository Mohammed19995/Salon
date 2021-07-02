<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Controller;

trait AuctionTrait
{
    public function closeAuction($auction) {
        optional($auction->prices()->orderByDesc('auction_price')->first())->id;
    }

    // help function
    public function validateAuctionToOpenType($auction)
    {
        $error = null;
        if(is_null($auction->initial_price) || is_null($auction->owner_room_id)) {
            $error = trans('error.auction_cant_to_open_if_data_not_full', ['name' => $auction->name]) . "<br>";
        }else if($auction->status != 1) {
            $error = trans('error.auction_cant_to_open_if_status_no_accept', ['name' => $auction->name]) . "<br>";
        }
        return $error;
    }
    public function validateAuctionToRejectStatus($auction)
    {
        $error = null;
        if($auction->type == 1) {
            $error = trans('error.auction_cant_to_reject_auction_opened', ['name' => $auction->name]) . "<br>";
        }
        if($auction->type == 2) {
            $error = trans('error.auction_cant_to_reject_auction_closed', ['name' => $auction->name]) . "<br>";
        }
        return $error;
    }

    public function validateAuctionToAcceptStatus($auction)
    {
        $error = null;
        if($auction->type == 1) {
            $error = trans('error.auction_cant_to_accept_auction_opened', ['name' => $auction->name]) . "<br>";
        }
        if($auction->type == 2) {
            $error = trans('error.auction_cant_to_accept_auction_closed', ['name' => $auction->name]) . "<br>";
        }
        return $error;
    }
}