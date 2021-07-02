<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits;

use Carbon\Carbon;

trait DateFormatTrait
{

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format(dateFormat());
    }
    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->format("Y-m-d h:i:s a");
    }
    public function getExpireIdDateAttribute($value) {
        return Carbon::parse($value)->format(dateFormat());
    }
    public function getAcceptDateAttribute($value) {
        return !is_null($value) ? Carbon::parse($value)->format(dateFormat()) : '';
    }
    public function getRejectDateAttribute($value) {
        return !is_null($value) ? Carbon::parse($value)->format(dateFormat()) : '';
    }
    public function getOpenDateAttribute($value) {
        return !is_null($value) ? Carbon::parse($value)->format(dateFormat()) : '';
    }
    public function getCloseDateAttribute($value) {
        return !is_null($value) ? Carbon::parse($value)->format(dateFormat()) : '';
    }

    public function getTransferDateAttribute($value) {
        return !is_null($value) ? Carbon::parse($value)->format(dateFormat()) : '';
    }


}