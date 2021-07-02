<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 9/8/2019
 * Time: 11:29 م
 */

namespace App\Repository;

// filters

use App\Filters\BankTransfer\BankTransferDateFilter;
use App\Filters\BankTransfer\BankTransferStatusFilter;
use App\Filters\BankTransfer\BankTransferUserFilter;
use App\Models\OrderBank;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use App\Models\Order;

class BankTransferRepository
{
    public $bankTransfer;

    public function __construct(OrderBank $bankTransfer)
    {
        $this->bankTransfer = $bankTransfer;
    }

    public function __call($name, $arguments)
    {
        return $this->bankTransfer->$name(...$arguments);
    }


    public function bankTransfers($orderBank = null)
    {
        $user = getUser(request()->user) ? request()->user->id : -1 ;
        $query = is_null($orderBank) ? OrderBank::GeneralData() : $orderBank->GeneralData();
        return app(Pipeline::class)
            ->send($query)
            ->through([
                BankTransferUserFilter::class,
                BankTransferDateFilter::class,
                BankTransferStatusFilter::class,
            ])
            ->thenReturn();
    }


}
