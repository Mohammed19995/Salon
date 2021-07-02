<?php

namespace App\Http\Controllers\Website;


use Illuminate\Http\Request;

class ResetPasswordController extends HomeController
{

    public function __construct() {
        parent::__construct();
        $this->middleware('guest:web');
    }

    public function index(Request $request) {
        return view('website.auth.reset_password' ,parent::$data);
    }

    public function showSendResetLink() {
        return view('website.auth.send_reset_password' ,parent::$data);
    }

}
