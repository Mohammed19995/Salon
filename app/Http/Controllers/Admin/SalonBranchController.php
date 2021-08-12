<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;

use App\Http\Requests\Admin\SalonBranch\AddSalonBranchRequest;
use App\Http\Requests\Admin\SalonBranch\UpdateSalonBranchRequest;
use App\Http\Requests\ExecuteOptionRequest;
use App\Models\SalonBranch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SalonBranchController extends HomeController
{

    public function __construct()
    {
        parent::__construct();


        self::$data['main_title'] = trans('admin.salon_branches');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.salon_branches'), 'url' => route('admin.salon_branches.index')],
        ];
        self::$data['active_menu'] = 'salon_branches';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {
        parent::$data['options'] = $this->options(['active', 'not_active', 'delete']);
        return view('admin.salon_branches.index', parent::$data);
    }


    public function create()
    {

    }

    public function store(AddSalonBranchRequest $request)
    {
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, null, null, true);
        SalonBranch::create($data);
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(UpdateSalonBranchRequest $request, SalonBranch $salonBranch)
    {
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, $salonBranch, 'image_id', false);
        $salonBranch->update($data);

        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        $salonBranch = SalonBranch::find($id);
        try {
            $salonBranch->delete();
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
                SalonBranch::whereIn('id', $ids)->update(['status' => 1]);
                $msg = trans('admin.update_status_to_active_success');
                break;
            case 2 :
                SalonBranch::whereIn('id', $ids)->update(['status' => 0]);
                $msg = trans('admin.update_status_to_not_active_success');
                break;
            case 3 :
                SalonBranch::destroy($ids);
                $msg = trans('admin.done_delete');
                break;

        }
        return responseJson(true, $msg, [], 200);

    }

    // remote data
    public function get_remote_brands(Request $request)
    {
        $brands = SalonBranch::query();

        return DataTables::of($brands)
            ->addColumn('select_record', function ($model) {
                return view('admin.salon_branches.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_image', function ($model) {
                return view('admin.salon_branches.parts.show_image', ['image' => $model->image])->render();
            })->addColumn('show_status', function ($model) {
                return view('admin.salon_branches.parts.status', ['id' => $model->id, 'status' => $model->status])->render();
            })->addColumn('actions', function ($model) {
                return view('admin.salon_branches.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }


}
