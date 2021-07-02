<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class OrderExport implements FromArray , WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public $orders;
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function array(): array
    {
        return $this->orders;
    }

    public function headings() : array
    {
        return [
            'order_id',
            'product' ,
            'quantity',
            'price',
            'total_price',
        ];
    }
}
