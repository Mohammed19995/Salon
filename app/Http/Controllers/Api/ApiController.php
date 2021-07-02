<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\General\BankResource;
use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\FileFacade;

use App\Http\Resources\General\SimpleDataResource;

// models
use App\Models\UserType;
use App\Models\City;
use App\Models\IdType;
use App\Models\Nationality;

class ApiController extends Controller
{

    public function cities(Request $request , $state_id) {
        return responseJson(true ,trans('msg.done'),['cities' => SimpleDataResource::collection(City::where('state_id' ,'=' ,$state_id)->get())],200);
    }
    public function banks(Request $request ) {
        return responseJson(true ,trans('msg.done'),['banks' => BankResource::collection(Bank::Active()->get())],200);
    }

}
