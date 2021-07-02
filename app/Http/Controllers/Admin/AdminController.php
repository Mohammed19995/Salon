<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;
use App\Http\Requests\Admin\Admin\AddAdminRequest;
use App\Http\Requests\Admin\Admin\UpdateAdminRequest;
use App\Http\Requests\ExecuteOptionRequest;
use App\Http\Resources\Admin\AdminListResource;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Role;
use App\Models\Service;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

// Requests

// models

class AdminController extends HomeController
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware('check_role:');

        self::$data['main_title'] = trans('admin.admins');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.admins'), 'url' => route('admin.admins.index')],
        ];
        self::$data['active_menu'] = 'admins';
        self::$data['sub_menu'] = '';
    }

    public function index()
    {
        parent::$data['countries'] = Country::Active()->get();
        parent::$data['roles'] = Role::Active()->get();

        parent::$data['options'] = $this->options(['active', 'not_active', 'delete']);
        return view('admin.admins.index', parent::$data);
    }


    public function create()
    {

    }

    public function store(AddAdminRequest $request)
    {
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, null, null, true);
        $data['password'] = bcrypt($request->password);
        $data['verified_at'] = Carbon::now();
        $admin = Admin::create($data);
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        /********************   check traffic cop  ************************************/
        $checkTrafficCop = $this->checkTrafficCop($request , $admin);
        if(!$checkTrafficCop['status'])  return response()->json($checkTrafficCop);
        /******************************************************************************/
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, $admin, 'image_id', false);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $admin->update($data);

        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        try {
            $admin->delete();
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
        $msg = "";
        switch ($option_id) {
            case 1 :
                Admin::whereIn('id', $ids)->update(['status' => 1]);
                $msg = trans('admin.update_status_to_active_success');
                break;
            case 2 :
                Admin::whereIn('id', $ids)->update(['status' => 0]);
                $msg = trans('admin.update_status_to_not_active_success');
                break;
            case 3 :
                Admin::destroy($ids);
                $msg = trans('admin.done_delete');
                break;
            case 4 :
                Admin::whereIn('id', $ids)->update(['verified_at' => Carbon::now()]);
                $msg = trans('admin.confirmed_account_success');
                break;
        }
        return responseJson(true, $msg, [], 200);

    }

    // remote data
    public function get_remote_admins(Request $request)
    {
        $admins = Admin::query();

        return DataTables::of($admins)
            ->addColumn('select_record', function ($model) {
                if ($model->is_super == 1) return "";
                return view('admin.admins.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_image', function ($model) {
                return view('admin.admins.parts.show_image', ['image' => $model->image])->render();
            })->addColumn('phone_with_code', function ($model) {
                return $model->phone_code . "-" . $model->phone;
            })->addColumn('show_code', function ($model) {
                return view('admin.admins.parts.show_code', ['code' => $model->code, 'verified_at' => $model->verified_at])->render();
            })->addColumn('show_status', function ($model) {
                return view('admin.admins.parts.status', ['id' => $model->id, 'status' => $model->status])->render();
            })->addColumn('actions', function ($model) {
                if ($model->is_super == 1) return "";
                return view('admin.admins.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }

    public function getListAdmins(Request $request) {
        $q = $request->q;
        $users = Admin::Status(1)->where('name' , 'LIKE' , "%$q%")->select('id' , 'name')->paginate(10);
        return response()->json(['items' => AdminListResource::collection($users) , 'incomplete_results' => $users->nextPageUrl() ? true : false, 'total_count' => $users->total()]);

    }

}
