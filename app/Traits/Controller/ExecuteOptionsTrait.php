<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Controller;

trait ExecuteOptionsTrait
{

    public function pointerToOptions($more_options)
    {

        $options = [
            'active' => ['id' => 1, 'name' => trans('admin.change_status_to_active')],
            'not_active' => ['id' => 2, 'name' => trans('admin.change_status_to_deactive')],
            'delete' => ['id' => 3, 'name' => trans('admin.delete')],
            'confirm_account' => ['id' => 4, 'name' => trans('admin.confirm_account')],
            'pending_auction' => ['id' => 5, 'name' => trans('admin.change_auction_type_to_pending')],
            'open_auction' => ['id' => 6, 'name' => trans('admin.change_auction_type_to_opened')],
            'close_auction' => ['id' => 7, 'name' => trans('admin.change_auction_type_to_closed')],
            'accept' => ['id' => 8, 'name' => trans('admin.change_status_to_accept')],
            'reject' => ['id' => 9, 'name' => trans('admin.change_status_to_reject')],
        ];
        foreach ($more_options as $key => $value) {
            switch ($key) {
                case 'order_statuses' :
                    foreach ($value as $key => $order_status) {
                        $options['status-' . $key] = ['id' => 'status-' . $key, 'name' => trans('admin.change_status_to', ['name' => $order_status['text']])];
                    }
                    break;
                case 'bank_statuses' :
                    foreach ($value as $key => $order_bank_status) {
                        $options['order-bank-status-' . $key] = ['id' => 'order-bank-status-' . $key, 'name' => trans('admin.change_order_bank_status_to', ['name' => $order_bank_status['text']])];
                    }
                    break;
            }
        }
        return $options;
    }

    public function options($allowed, $more_options = [])
    {
        return json_encode(array_filter($this->pointerToOptions($more_options), function ($key) use ($allowed) {
            return in_array($key, $allowed) || strpos($key, 'status') !== false;
        },
            ARRAY_FILTER_USE_KEY
        ));
    }


}