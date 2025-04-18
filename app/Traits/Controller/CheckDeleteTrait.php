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
use App\Models\Salon;
use App\Models\Slider;
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

            City::class   => [
                'users'         => trans('error.cant_delete_because_have_users' , ['name' => $model->name]),
                'salons'        => trans('error.cant_delete_because_have_salons' , ['name' => $model->name])
            ]
        ];
        return $messages[get_class($model)][$relation];
    }

    public function getRelations($model) {
        $relations = [
            User::class      => [],
            City::class      => ['users' , 'salons'],
            Salon::class     => [],
            Slider::class    => [],
        ];
        return $relations[get_class($model)];
    }

}