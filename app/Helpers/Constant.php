<?php
use Carbon\Carbon;

function getUploadsPath($path = "") {
    return public_path()."/uploads/".$path;
}
function getUploadsThumbPath($path = "") {
    return public_path()."/uploads/thumbs/".$path;
}

function statusData() {
    return [
        0 => ['id' => 0,'text' => trans('admin.not_active') , 'class' => 'label-light-danger '],
        1 => ['id' => 1,'text' => trans('admin.active') , 'class' => 'label-light-info'],
    ];
}
function statusPhoneCodeData() {
    return [
        0 => ['id' => 0,'text' => trans('admin.not_confirmed') , 'class' => 'label-light-danger '],
        1 => ['id' => 1,'text' => trans('admin.confirmed') , 'class' => 'label-light-info'],
    ];
}

function userTypeData() {
    return [
        0 => ['id' => 1,'text' => trans('admin.user') , 'class' => 'label-light-danger '],
        1 => ['id' => 2,'text' => trans('admin.room_owner') , 'class' => 'label-light-info'],
    ];
}

function auctionStatusData() {
    return [
        0 => ['id'=> 0,'text' => trans('admin.pending') , 'class' => 'label-light-default'],
        1 => ['id'=> 1,'text' => trans('admin.accepted') , 'class' => 'label-light-primary'],
        2 => ['id'=> 2,'text' => trans('admin.rejected') , 'class' => 'label-light-danger'],

    ];
}
function auctionTypeData() {
    return [
        0 => ['id'=> 0,'text' => trans('admin.pending') , 'class' => 'label-light-default'],
        1 => ['id'=> 1,'text' => trans('admin.opened') , 'class' => 'label-light-primary'],
        2 => ['id'=> 2,'text' => trans('admin.closed') , 'class' => 'label-light-danger'],

    ];
}

function orderStatusData() {
    return [
        0 => ['id' => 0,'text' => trans('admin.pending') , 'class' => 'label-light-default '],
        1 => ['id' => 1,'text' => trans('admin.finished') , 'class' => 'label-light-info'],
        2 => ['id' => 2,'text' => trans('admin.canceled') , 'class' => 'label-light-danger'],
    ];
}
function bankTransferStatusData() {
    return [
        0 => ['id'=> 0,'text' => trans('admin.pending') , 'class' => 'label-light-default'],
        1 => ['id'=> 1,'text' => trans('admin.accepted') , 'class' => 'label-light-primary'],
        2 => ['id'=> 2,'text' => trans('admin.rejected') , 'class' => 'label-light-danger'],

    ];
}
function dateFormat() {
    return "Y-m-d h:i a";
}


function getDaysOfWeek() {
    return [
        Carbon::SATURDAY    => 'السبت',
        Carbon::SUNDAY      => 'الاحد',
        Carbon::MONDAY      => 'الاثنين',
        Carbon::TUESDAY     => 'الثلاثاء',
        Carbon::WEDNESDAY   => 'الاربعاء',
        Carbon::THURSDAY    => 'الخميس',
        Carbon::FRIDAY      => 'الجمعة'
    ];
}