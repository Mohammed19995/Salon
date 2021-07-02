<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserNotificationEvent;
use App\Facades\FileFacade;
use App\Http\Requests\Admin\Notification\AddNotificationRequest;
use App\Http\Requests\Admin\User\AddUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Http\Requests\ExecuteOptionRequest;

use App\Http\Resources\User\UserListResource;
use App\Jobs\TestJob;
use App\Models\UserNotification;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

// support
use Carbon\Carbon;

// traits
use App\Traits\Controller\RegisterDataTrait;

// models
use App\Models\Country;
use App\Models\UserType;
use App\Models\User;

class NotificationController extends HomeController
{


    public function __construct()
    {
        parent::__construct();

        $this->middleware('check_role:view_notification|add_notification', ['only' => ['index', 'show']]);
        $this->middleware('check_role:add_notification', ['only' => ['store', 'create']]);

        self::$data['main_title'] = trans('admin.notifications');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.notifications'), 'url' => route('admin.notifications.index')],
        ];
        self::$data['active_menu'] = 'notifications';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {

        parent::$data['countries'] = Country::Active()->get();
        parent::$data['options'] = $this->options(['active', 'not_active', 'delete', 'confirm_account']);
        parent::$data['statuses'] = json_encode(statusData());
        parent::$data['types'] = json_encode(userTypeData());
        parent::$data['phone_code_statuses'] = json_encode(statusPhoneCodeData());

        return view('admin.notifications.index', parent::$data);
    }


    public function create()
    {


    }

    public function store(AddNotificationRequest $request)
    {
        $data = $request->validated();
        $userNotification = UserNotification::create([
            'title' => $data['title'],
            'message' => $data['message']
        ]);
        event(new UserNotificationEvent($data, $userNotification->id, $userNotification->getRawOriginal('title'), $userNotification->getRawOriginal('message')));
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }


    // remote data
    public function getRemoteNotification(Request $request)
    {
        $notifications = UserNotification::select('*');
        return DataTables::of($notifications)
            ->addColumn('select_record', function ($model) {
                return view('admin.notifications.parts.select_record', ['id' => $model->id])->render();
            })
            ->addColumn('actions', function ($model) {
                return view('admin.notifications.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }

    public function getNotificationUsers(Request $request)
    {
        if (is_null($request->id)) $users = [];
        else {
            $users = User::whereIn('id', function ($query) use ($request) {
                $query->from('notifications')->select('notifiable_id')->where('user_notification_id', '=', $request->id);
            });
        }
        return DataTables::of($users)
            ->addColumn('show_image', function ($model) {
                return view('admin.users.parts.show_image', ['image' => $model->image])->render();
            })->addColumn('phone_with_code', function ($model) {
                return $model->phone_code . "-" . $model->phone;
            })->escapeColumns(['*'])->make(true);
    }

}
