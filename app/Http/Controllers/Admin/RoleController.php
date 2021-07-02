<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;
use App\Http\Requests\Admin\Role\AddRoleRequest;
use App\Http\Requests\ExecuteOptionRequest;
use App\Http\Resources\Category\CategoryDTFResource;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Route;
use Yajra\DataTables\Facades\DataTables;

// Requests

// models

class RoleController extends HomeController
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware('check_role:');

        self::$data['main_title'] = trans('admin.roles');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.roles'), 'url' => route('admin.roles.index')],
        ];
        self::$data['active_menu'] = 'roles';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {

      //  return Permission::select('key')->orderBy('parent')->get();
        parent::$data['options'] = $this->options(['active', 'not_active', 'delete']);
        parent::$data['permissions'] = Permission::active()->select('*')->get()->groupBy('parent');
        return view('admin.roles.index', parent::$data);
    }


    public function create()
    {

    }

    public function store(AddRoleRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data);
        $role->permissions()->sync(json_decode($request->permission_ids));
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(AddRoleRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);
        $role->permissions()->sync(json_decode($request->permission_ids));
        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        try {
            Role::destroy($id);
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
        switch ($option_id) {
            case 1 :
                Role::whereIn('id', $ids)->update(['status' => 1]);
                break;
            case 2 :
                Role::whereIn('id', $ids)->update(['status' => 0]);
                break;
            case 3 :
                Role::destroy($ids);
                break;
        }
        return responseJson(true, trans('admin.update_success'), [], 200);

    }

    // remote data
    public function get_remote_Role(Request $request)
    {
        $roles = Role::with(['permissions']);

        return DataTables::of($roles)
            ->addColumn('select_record', function ($model) {
                return view('admin.roles.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_status', function ($model) {
                return view('admin.roles.parts.status', ['id' => $model->id, 'status' => $model->status])->render();
            })->addColumn('actions', function ($model) {
                return view('admin.roles.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }

}
