<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Http\Resources\General\SimpleDataResource;

class BankController extends HomeController
{

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        parent::$data['banks'] = json_encode(SimpleDataResource::collection(Bank::Active()->get()));
        return view('website.bank_transfer' ,parent::$data);
    }


}
