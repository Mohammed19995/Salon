<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 13/6/2020
 * Time: 05:26 م
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class TreeFunctionFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return "tree-Service";
    }
}

