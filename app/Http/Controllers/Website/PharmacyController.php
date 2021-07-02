<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;

use App\Models\User;

class PharmacyController extends HomeController
{

    public function __construct() {
        parent::__construct();
    }


    public function create(Request $request) {
        $user = getUser($request->user);
        if(!is_null($user->parent_id)) abort(404);

        parent::$data['edit'] = json_encode(false);
        parent::$data['pharmacy'] = json_encode(null);

        return view('website.pharmacy.add_sub' ,parent::$data);
    }

    public function edit(Request $request , User $pharmacy) {
        $user = getUser($request->user);
        if(!$user->can('editSub' , $pharmacy)) {
            abort(404);
        }
        parent::$data['edit'] = true;
        parent::$data['pharmacy'] = $pharmacy;
        return view('website.pharmacy.add_sub' ,parent::$data);
    }

}
