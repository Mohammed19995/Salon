<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;

class AccountController extends HomeController
{

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        return view('website.account.account' ,parent::$data);
    }


}
