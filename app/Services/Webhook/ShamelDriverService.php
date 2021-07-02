<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 13/6/2020
 * Time: 05:15 م
 */

namespace App\Services\Webhook;

use Illuminate\Support\Facades\Http;

use App\Models\Order;

class ShamelDriverService
{
    public $app_id;
    public $url;

    public function __construct()
    {
        $this->app_id = env('SHAMEL_DRIVER_APP_ID');
        $this->url = env('SHAMEL_DRIVER_URL');
    }

    public function send($order_id) {
        $order = Order::with(['order_products','bill'])->find($order_id);
        $order_products = $order->order_products;
        $order_products->map(function ($value) use($order) {
            $value->from_lat = '21.560889';
            $value->from_lng = '39.168417';

            $value->destination = $order->address;
            $value->information = json_decode(json_encode($value->product))->name->ar;
            $value->information_eng =  json_decode(json_encode($value->product))->name->en;

            return $value;
        });


        $data = [
            'phone' => $order->user->phone, 'name' => $order->user->name, 'app_id' => $this->app_id,
            'order_id' => $order->id, 'comment' => 'comment', 'type' => 0,'to_lat' => $order->bill->lat,
            'to_lng' => $order->bill->lng,'data' => $order_products, 'from_lat' => '21.560889', 'from_lng' => '39.168417',
            'destination' => $order->bill->address, 'client_name' => $order->bill->first_name, 'client_phone' => $order->bill->phone,
            'payment' => $order->payment_method_id, 'price' => $order->price, 'wallet' => 0, 'discount_price' => 0,
            'total_price' => $order->total_price, 'shipping' => $order->shipping,
        ];

        $response = Http::post($this->url."makeOrder", $data);
        $result = $response->json();
        return $this->handleResponse($result);
    }

    public function handleResponse($result){
        if(isset($result['errors'])) {
            return generalResponse(false, $this->convertErrorsToString(array_values($result['errors'])) , [], 422);
        }else {
            return generalResponse(true, $result['msg'] , [], 200);

        }
    }
    public function convertErrorsToString($errors) {
        $str = [];
        foreach ($errors as $error) {
            $str[] = implode(' | ' , $error);
        }
        return implode(" , " , $str);
    }
}