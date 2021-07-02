<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Controller;

// controllers
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\NeighborhoodController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FormServiceController;
use App\Http\Controllers\Admin\ComplaintCategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\NationalityController;
use App\Http\Controllers\Admin\GovernmentController;
use App\Http\Controllers\Admin\OrderStatusController;
use App\Http\Controllers\Admin\IdTypeController;
use App\Http\Controllers\Admin\SocialStatusController;
use App\Http\Controllers\Admin\OrderEventController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\Auction\AuctionController;
use App\Http\Controllers\Api\BankTransferController;
use App\Http\Controllers\Api\NotificationController;

trait PermissionKeyWithController
{
    public function getPermissionKeyWithController($controller) {
        $result = [
            CountryController::class              => 'country',
            CityController::class                 => 'city',
            NeighborhoodController::class         => 'neighborhood',
            UserController::class                 => 'user',
            AuctionController::class              => 'auction',
            OrderController::class                => 'order',
            BankController::class                 => 'bank',
            BankTransferController::class         => 'bank_transfer',
            NotificationController::class         => 'notification',

        ];
        return array_key_exists($controller , $result) ? $result[$controller] : '';
    }

    public function getKeyWithNumberOption($number) {
        switch ($number) {
            case 1 :
            case 2 :
            case 4 :
                return "edit";
            case 3:
                return "delete";
            default :
                return "edit";
        }
    }
}