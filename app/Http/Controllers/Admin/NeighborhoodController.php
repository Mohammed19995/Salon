<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

// Requests
use App\Http\Requests\Admin\Neighborhood\AddNeighborhoodRequest;
use App\Http\Requests\Admin\Neighborhood\UpdateNeighborhoodRequest;
use App\Http\Requests\ExecuteOptionRequest;

// models
use App\Models\Neighborhood;
use App\Models\Country;

class NeighborhoodController extends HomeController
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware('check_role:view_neighborhood|add_neighborhood|edit_neighborhood|delete_neighborhood', ['only' => ['index']]);
        $this->middleware('check_role:add_neighborhood', ['only' => ['store']]);
        $this->middleware('check_role:edit_neighborhood', ['only' => ['update']]);
        $this->middleware('check_role:delete_neighborhood', ['only' => ['destroy']]);


        self::$data['main_title'] = trans('admin.neighborhoods');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.neighborhoods'), 'url' => route('admin.neighborhoods.index')],
        ];
        self::$data['active_menu'] = 'neighborhoods';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {
        parent::$data['countries'] = Country::Active()->get();
        parent::$data['options'] = $this->options(['active' , 'not_active' ,'delete']);
        return view('admin.neighborhoods.index', parent::$data);
    }


    public function create()
    {

    }

    public function store(AddNeighborhoodRequest $request)
    {

        $data = $request->validated();
        Neighborhood::create($data);
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(UpdateNeighborhoodRequest $request, Neighborhood $neighborhood)
    {
        /********************   check traffic cop  ************************************/
        $checkTrafficCop = $this->checkTrafficCop($request , $neighborhood);
        if(!$checkTrafficCop['status'])  return response()->json($checkTrafficCop);
        /******************************************************************************/
        $data = $request->validated();
        $neighborhood->update($data);
        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        try {
            Neighborhood::destroy($id);
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
                Neighborhood::whereIn('id', $ids)->update(['status' => 1]);
                break;
            case 2 :
                Neighborhood::whereIn('id', $ids)->update(['status' => 0]);
                break;
            case 3 :
                Neighborhood::destroy($ids);
                break;
        }
        return responseJson(true, trans('admin.update_success'), [], 200);

    }

    // remote data
    public function get_remote_neighborhood (Request $request)
    {
        $country_id = $request->country_id;
        $neighborhoods = Neighborhood::with('city.country')
            ->Country($country_id);
        if($country_id != -1 && !empty($country_id) && !is_null($country_id)) {
            $neighborhoods = $neighborhoods->City($request->city_id);
        }

        return DataTables::of($neighborhoods)
            ->addColumn('select_record', function ($model) {
                return view('admin.neighborhoods.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_status', function ($model) {
                return view('admin.neighborhoods.parts.status', ['id' => $model->id, 'status' => $model->status])->render();
            })->addColumn('actions', function ($model) {
                return view('admin.neighborhoods.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }
    public function getRemoteCityNeighborhoods(Request $request ,$city_id) {
        return responseJson(true, trans('admin.done'), [
            'neighborhoods' => Neighborhood::Active()->City($city_id)->get()
        ], 200);
    }


}
