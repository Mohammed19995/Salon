<?php

namespace App\Http\Controllers\Website;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
class OrderController extends HomeController
{

    public function __construct() {
        parent::__construct();
    }

    public function show(Request $request ,Order $order) {
        $user = getUser($request->user);
        if (!$user->can('view', $order)) {
            abort(404);
        }
        if($request->has('notification_id')) {
            $user->notifications()->where('id','=' ,$request->notification_id)->whereNull('read_at')->update(['read_at' => Carbon::now()]);
        }
        parent::$data['order_id'] = $order->id;
        return view('website.order_details' ,parent::$data);
    }


}
