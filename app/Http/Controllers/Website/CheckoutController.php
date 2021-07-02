<?php

namespace App\Http\Controllers\Website;


use Illuminate\Http\Request;

class CheckoutController extends HomeController
{

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        $user = getUser($request->user);
        parent::$data['user'] = $user;
        return view('website.checkout' ,parent::$data);
    }


}
