<?php
/**
 * Created by PhpStorm.
 * User: Mohammed AlBanna
 * Date: 2021-02-03
 * Time: 11:23 AM
 */

namespace App\Services\Payment;


interface PaymentGetway
{

    public function payment($data);
    public function getPayment($payment_id);
}