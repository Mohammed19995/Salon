<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;
use App\Http\Requests\Admin\User\AddUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Http\Requests\ExecuteOptionRequest;

use App\Http\Resources\User\UserListResource;
use App\Repository\UserRepository;
use App\Traits\Cache\CategoryCacheTrait;
use App\Traits\Controller\CheckDeleteTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

// support
use Carbon\Carbon;

// traits
use App\Traits\Controller\RegisterDataTrait;

// models
use App\Models\Country;
use App\Models\UserType;
use App\Models\User;

class UserController extends HomeController
{
    use RegisterDataTrait , CheckDeleteTrait , CategoryCacheTrait;

    public $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        parent::__construct();

        $this->middleware('check_role:view_user|add_user|edit_user|delete_user', ['only' => ['index','show']]);
        $this->middleware('check_role:add_user', ['only' => ['store','create']]);
        $this->middleware('check_role:edit_user', ['only' => ['update','edit']]);
        $this->middleware('check_role:delete_user', ['only' => ['destroy']]);


        $this->user_repository = $user_repository;

        self::$data['main_title'] = trans('admin.users');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.users'), 'url' => route('admin.users.index')],
        ];
        self::$data['active_menu'] = 'users';
        self::$data['sub_menu'] = '';

    }

    public function index(Request $request)
    {
        parent::$data['countries'] = Country::Active()->get();
        parent::$data['options'] = $this->options(['active','not_active','delete' ,'confirm_account' ]);
        parent::$data['statuses'] = json_encode(statusData());
        parent::$data['types'] = json_encode(userTypeData());
        parent::$data['phone_code_statuses'] = json_encode(statusPhoneCodeData());

        if($request->type == 1) {
            self::$data['active_menu'] = 'users';
            return view('admin.users.index', parent::$data);
        }else {
            self::$data['categories'] = collect(Cache::get('categories_cache'))->whereNull('parent_id');
            self::$data['active_menu'] = 'employees';
            return view('admin.employees.index', parent::$data);
        }


    }


    public function create()
    {


    }

    public function store(AddUserRequest $request)
    {
        $this->user_repository->add($request);
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(UpdateUserRequest $request, User $user)
    {
        /********************   check traffic cop  ************************************/
        $checkTrafficCop = $this->checkTrafficCop($request , $user);
        if(!$checkTrafficCop['status'])  return response()->json($checkTrafficCop);
        /******************************************************************************/
        $this->user_repository->update($request , $user);
        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        $user = $this->user_repository->find($id);
        try {

            $checkDelete = $this->checkDelete($user ,$this->getRelations($user));
            if(!is_null($checkDelete)) {
                return responseJson(false, $checkDelete, [], 422);
            }
            $user->delete();
            return responseJson(true, trans('admin.done_delete'), [], 200);

        } catch (\Exception $e) {
            return responseJson(false, $e->getMessage(), [], 200);

        } catch (\Error $e) {
            return responseJson(false, $e->getMessage(), [], 200);

        }

    }

    // execute options
    public function executeOptions(ExecuteOptionRequest $request)
    {
        $ids = $request->ids;
        $option_id = $request->option_id;
        $msg ="";
        $errors = [];
        switch ($option_id) {
            case 1 :
                User::whereIn('id', $ids)->update(['status' => 1]);
                $msg = trans('admin.update_status_to_active_success');
                break;
            case 2 :
                User::whereIn('id', $ids)->update(['status' => 0]);
                $msg = trans('admin.update_status_to_not_active_success');
                break;
            case 3 :
                $users = User::whereIn('id' , $ids)->get();
                foreach ($users as $user) {
                    $checkDelete = $this->checkDelete($user ,$this->getRelations($user));
                    if(!is_null($checkDelete)) {
                        $errors[] = $checkDelete;
                    }else {
                        $user->delete();
                    }
                    $msg = trans('admin.done_delete');
                }
                break;
            case 4 :
                User::whereIn('id', $ids)->update(['verified_at' => Carbon::now()]);
                $msg = trans('admin.confirmed_account_success');
                break;
        }
        if (count($errors) > 0) {
            array_unshift($errors, trans('error.error_in_execute_option'));
            return responseJson(false, implode('<hr>', $errors), [], 422);
        } else {
            return responseJson(true, $msg, [], 200);
        }

    }

    // remote data
    public function get_remote_users(Request $request)
    {
        $country_id = $request->country_id;
        $users = User::with('city.country','categories','working_times')
            ->Status($request->status)
            ->Type($request->type)
            ->PhoneCodeStatus($request->phone_code_status)
            ->FilterDate('users.created_at', $request->start_date, $request->end_date)
            ->Country($country_id);

        if($country_id != -1 && !empty($country_id) && !is_null($country_id)) {
            $users = $users->City($request->city_id);
        }
        return DataTables::of($users)
            ->addColumn('select_record', function ($model) {
                if ($model->is_super == 1) return "";
                return view('admin.users.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_code', function ($model) {
                return view('admin.users.parts.show_code', ['code' => $model->code, 'verified_at' => $model->verified_at])->render();
            })->addColumn('show_image', function ($model) {
                return view('admin.users.parts.show_image', ['image' => $model->image])->render();
            })->addColumn('phone_with_code', function ($model) {
                return $model->phone_code . "-" . $model->phone;
            })->addColumn('show_code', function ($model) {
                return view('admin.users.parts.show_code', ['code' => $model->code, 'verified_at' => $model->verified_at])->render();
            })
            ->addColumn('show_status', function ($model) {
                return view('admin.users.parts.status', ['id' => $model->id, 'status' => $model->status])->render();
            })
            ->addColumn('actions', function ($model) {
                return view('admin.users.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }
    public function getListUsers(Request $request) {
        $q = $request->q;
        $users = User::Status(1)->Type($request->type)->where('name' , 'LIKE' , "%$q%")->select('id' , 'name')->paginate(10);
        return response()->json(['items' => UserListResource::collection($users) , 'incomplete_results' => $users->nextPageUrl() ? true : false, 'total_count' => $users->total()]);

    }


}
