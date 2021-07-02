<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Controller\ExecuteOptionsTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;

use App\Repository\HomeRepository;

class HomeController extends Controller
{
    use ExecuteOptionsTrait;

    public static $data = [];
    public function __construct()
    {
        self::$data['locales'] = \GuzzleHttp\json_encode(config('app.locales'));
        self::$data['days'] = json_encode(getDaysOfWeek());
        self::$data['active_menu'] = 'home';
        self::$data['sub_menu'] = '';

        self::$data['main_title'] = trans('admin.home');
        self::$data['breadcrumbs'] = [];

    }

//    public function index() {
//        return view('admin.index' ,self::$data);
//    }
    public function checkTrafficCop($request , Model $model) {
        if($request->can_update_anyway == 0 && $request->updated_at != $model->updated_at) {
            $response = generalResponse(false, trans('error.another_user_update_this_row'), ['error_code' => 409], 422);
        }else {
            $response = generalResponse(true, trans('admin.done'), [], 200);
        }
        return $response;
    }
}
