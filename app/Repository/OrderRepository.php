<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 9/8/2019
 * Time: 11:29 م
 */

namespace App\Repository;

// filters
use App\Filters\Order\OrderPaymentMethodFilter;
use App\Filters\Order\OrderStatusFilter;
use App\Filters\Order\OrderUserFilter;
use App\Filters\Order\OrderDateFilter;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use App\Models\Order;

class OrderRepository
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function __call($name, $arguments)
    {
        return $this->order->$name(...$arguments);
    }


    public function orders($order = null)
    {
        $user = getUser(request()->user) ? request()->user->id : -1 ;
        $query = is_null($order) ? Order::GeneralData() : $order->GeneralData();
        return app(Pipeline::class)
            ->send($query)
            ->through([
                OrderUserFilter::class,
                OrderDateFilter::class,
                OrderStatusFilter::class,
                OrderPaymentMethodFilter::class
            ])
            ->thenReturn();
    }


}
