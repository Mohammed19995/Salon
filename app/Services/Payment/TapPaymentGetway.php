<?php
/**
 * Created by PhpStorm.
 * User: Mohammed AlBanna
 * Date: 2021-02-03
 * Time: 11:24 AM
 */

namespace App\Services\Payment;


use Illuminate\Support\Facades\Http;

class TapPaymentGetway implements PaymentGetway
{

    public $url = "https://api.tap.company/v2";
    public $token = "sk_test_uC7AJ8gn5McobzZOvdyqGf91";

    public function payment($data){

        $paymentData = [
            'amount'                => $data['amount'] ,
            'currency'              => 'SAR',
            'threeDSecure'          => true ,
            "save_card"             => false,
            "description"           => "Test Description",
            "statement_descriptor"  => "Sample",
            "source"                => [
                "id"                => "src_all",
            ],
            "customer"              => [
                "first_name"        => $data['user']->name ,
                "middle_name"       => $data['user']->name ,
                "last_name"         => $data['user']->name ,
                "email"             => $data['user']->email ,
                "phone"             => [
                    "country_code"  => $data['user']->phone_code ,
                    "number"        => $data['user']->phone
                ] ,

            ],
            "redirect" => [
                "url"           => url('api/tap-payment'),
            ]
        ];
        $result = Http::withToken($this->token)->post($this->url."/charges" ,$paymentData);
        return json_decode($result->body() , true);

    }

    public function getPayment($payment_id) {
        $result = Http::withToken($this->token)->get($this->url."/charges/".$payment_id );
        return json_decode($result->body() , true);
    }
}