<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 13/6/2020
 * Time: 05:26 م
 */

namespace App\Facades\Webhook;


use Illuminate\Support\Facades\Facade;

class ShamelDriverFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return "shamel-driver-Service";
    }
}

