<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;

class MyAccountController extends HomeController
{

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        $user = getUser($request->user);
        parent::$data['user'] = $user;
        return view('website.account.my_account' ,parent::$data);
    }


}
