<?php

namespace App\Http\Controllers\Admin;

class LiveController extends HomeController
{

    public function __construct()
    {
        parent::__construct();

        self::$data['main_title'] = trans('admin.live');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.live'), 'url' => route('admin.live.index')],
        ];
        self::$data['active_menu'] = 'live';
        self::$data['sub_menu'] = '';

    }

    public function live() {
        return view('admin.live.index' , parent::$data);
    }

    public function watch() {
        return view('admin.live.watch' , parent::$data);
    }

}
