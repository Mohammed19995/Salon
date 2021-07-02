<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Service\Payment;


use App\Services\Payment\PaymentGetway;
use App\Services\Payment\TapPaymentGetway;

trait PaymentTrait
{
    public function executePayment(PaymentGetway $paymentGetway , $data) {
        return $paymentGetway->payment($data);
    }
    public function checkPaymentStatus(PaymentGetway $paymentGetway , $paymentId) {
        return $paymentGetway->getPayment($paymentId);
    }
    public function getPaymentGetway() {
        return new TapPaymentGetway();
    }
}