<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits;



use App\Notifications\AcceptAuctionNotification;
use App\Notifications\BankTransferNotification;
use App\Notifications\CloseAuctionNotification;
use App\Notifications\OpenAuctionNotification;
use App\Notifications\RejectAuctionNotification;
use App\Notifications\UserNotification;
use App\Notifications\WinnerAuctionNotification;

trait NotificationTrait
{

    public function getTitleNotification($type, $data , $lang = 'ar')
    {
        $title = "";
        switch ($type) {
            case AcceptAuctionNotification::class :
                $title = trans('notification.accept_auction', $data , $lang);
                break;
            case RejectAuctionNotification::class :
                $title = trans('notification.reject_auction', $data , $lang);
                break;
            case OpenAuctionNotification::class :
                $title = trans('notification.open_auction', $data , $lang);
                break;
            case CloseAuctionNotification::class :
                $title = trans('notification.open_auction', $data , $lang);
                break;
            case WinnerAuctionNotification::class :
                $title = trans('notification.open_auction', $data , $lang);
                break;
            case UserNotification::class :
                $title = json_decode($data['_title_'] , true)[$lang];
                break;
            case BankTransferNotification::class :
                switch ($data['status']) {
                    case 0 :
                        $title = trans('notification.pending_bank_transfer', $data , $lang);
                        break;
                    case 1 :
                        $title = trans('notification.accept_bank_transfer', $data , $lang);
                        break;
                    case 2 :
                        $title = trans('notification.reject_bank_transfer', $data , $lang);;
                        break;
                }

        }
        return $title;
    }

    public function getSubTitleNotification($type ,$data ,  $lang = 'ar')
    {
        $sub_title = "";
        switch ($type) {
            case AcceptAuctionNotification::class :
                $sub_title = trans('notification.accept_auction_desc', $data , $lang);
                break;
            case RejectAuctionNotification::class :
                $sub_title = trans('notification.reject_auction_desc', $data , $lang);
                break;
            case OpenAuctionNotification::class :
                $sub_title = trans('notification.open_auction_desc', $data , $lang);
                break;
            case CloseAuctionNotification::class :
                $sub_title = trans('notification.close_auction_desc', $data , $lang);
                break;
            case WinnerAuctionNotification::class :
                $sub_title = trans('notification.winner_auction_desc', $data , $lang);
                break;
            case UserNotification::class :
                $sub_title = json_decode($data['_message_'] , true)[$lang];
                break;
            case BankTransferNotification::class :
                switch ($data['status']) {
                    case 0 :
                        $sub_title = trans('notification.pending_bank_transfer_desc', $data , $lang);
                        break;
                    case 1 :
                        $sub_title = trans('notification.accept_bank_transfer_desc', $data , $lang);
                        break;
                    case 2 :
                        $sub_title = trans('notification.reject_bank_transfer_desc', $data , $lang);;
                        break;
                }

        }
        return $sub_title;
    }

}