<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auction;
use App\Models\PaymentMethod;
use App\Traits\Controller\ExecuteOptionsTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;

use App\Repository\HomeRepository;
use Illuminate\Support\Facades\DB;
// models
use App\Models\Order;
use App\Models\User;

class IndexController extends HomeController
{

    public function __construct()
    {
        parent::__construct();

        parent::$data['main_title'] = trans('admin.home');
        parent::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.id_types'), 'url' => route('admin.index')],
        ];
        parent::$data['active_menu'] = 'home';
        parent::$data['sub_menu'] = '';


    }

    public function home(Request $request) {

        $start_at = $request->filled('start_at') ? $request->start_at : Carbon::now()->subDays(29)->format('Y-m-d');
        $end_at = $request->filled('end_at') ? $request->end_at : Carbon::now()->format('Y-m-d');

        parent::$data['start_at'] = $start_at;
        parent::$data['end_at'] = $end_at;

        return view('admin.index' ,parent::$data);
    }



}
