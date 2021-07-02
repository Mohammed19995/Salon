<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 9/8/2019
 * Time: 11:29 م
 */

namespace App\Repository;
// models
use Carbon\Carbon;
use Illuminate\Http\Request;


class HomeRepository
{

    public function getServices(Request $request) {
        $services = Service::withCount('orders')->get();
        return $services;
    }
}