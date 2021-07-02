<?php

namespace App\Http\Controllers\Website;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\General\SimpleDataResource;
use App\Http\Resources\SliderResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends HomeController
{

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {

        return view('website.index' ,parent::$data);
    }


    // help
    public function getOrderByData() {
        return [
            ['id' => 'latest' , 'name' => trans('website.latest')] ,
            ['id' => 'oldest' , 'name' => trans('website.oldest')] ,
            ['id' => 'price_asc' , 'name' => trans('website.price_asc')] ,
            ['id' => 'price_desc' , 'name' => trans('website.price_desc')] ,
        ];
    }
    public function getLimitNumbers() {
        return [8 , 16 , 32 , 64];
    }
}
