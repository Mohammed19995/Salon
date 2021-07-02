<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderQueryExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

    public $orders;
    public function __construct($orders)
    {
        $this->orders = $orders;
    }


    public function query()
    {
        return $this->orders;
    }

    public function map($order): array
    {
        return [
            $order->id,
            $order->user->display_name,
            $order->service->name,
            optional($order->state)->name,
            optional($order->city)->name,
            $order->created_at,
            optional($order->get_status)->name
        ];
    }
    public function headings() : array
    {
        return [
            'id',
            'user_name' ,
            'service_name' ,
            'state',
            'city',
            'date',
            'statue'
        ];
    }
}
