<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Controller;

use App\Models\Auction;
use App\Models\Bank;
use App\Models\City;
use App\Models\User;

trait CheckDeleteTrait
{
    // help function
    public function checkDelete($model ,$relations) {
        $error = null;
        foreach ($relations as $relation) {
            if($model->$relation()->count() > 0) {
                $error = $this->errorMessages($model , $relation);
                break;
            }
        }
        return $error;
    }

    public function errorMessages($model , $relation) {
        $messages =  [
            User::class => [
                'auctions'       => trans('error.cant_delete_because_have_auction' , ['name' => $model->name]),
                'owner_auctions' => trans('error.cant_delete_because_have_auction' , ['name' => $model->name]),
                'orders'         => trans('error.cant_delete_because_have_orders' , ['name' => $model->name]),
            ],
            Auction::class => [
                'prices'         => trans('error.cant_delete_because_have_prices' , ['name' => $model->name]),
            ],
            Bank::class   => [
                'order_banks'    => trans('error.cant_delete_because_have_bank_transfer' , ['name' => $model->name]),
            ],
            City::class   => [
                'users'         => trans('error.cant_delete_because_have_users' , ['name' => $model->name]),
                'auctions'      => trans('error.cant_delete_because_have_auctions' , ['name' => $model->name])
            ]
        ];
        return $messages[get_class($model)][$relation];
    }

    public function getRelations($model) {
        $relations = [
            User::class      => ['auctions','owner_auctions','orders'],
            Auction::class   => ['prices'],
            Bank::class      => ['order_banks'],
            City::class      => ['users' , 'auctions']
        ];
        return $relations[get_class($model)];
    }

}