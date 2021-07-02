<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;
use App\Http\Requests\Admin\City\AddCityRequest;
use App\Http\Requests\Admin\City\UpdateCityRequest;
use App\Http\Requests\ExecuteOptionRequest;
use App\Http\Resources\Category\CategoryDTFResource;
use App\Models\City;
use App\Models\Country;
use App\Traits\Controller\CheckDeleteTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class CityController extends HomeController
{
    use CheckDeleteTrait;
    public function __construct()
    {
        parent::__construct();

        $this->middleware('check_role:view_city|add_city|edit_city|delete_city', ['only' => ['index']]);
        $this->middleware('check_role:add_city', ['only' => ['store']]);
        $this->middleware('check_role:edit_city', ['only' => ['update']]);
        $this->middleware('check_role:delete_city', ['only' => ['destroy']]);


        self::$data['main_title'] = trans('admin.cities');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.cities'), 'url' => route('admin.cities.index')],
        ];
        self::$data['active_menu'] = 'cities';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {

        parent::$data['countries'] = Country::Active()->get();
        parent::$data['options'] = $this->options(['active' , 'not_active' , 'delete']);
        return view('admin.cities.index', parent::$data);
    }


    public function create()
    {

    }

    public function store(AddCityRequest $request)
    {

        $data = $request->validated();
        City::create($data);
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(UpdateCityRequest $request, City $city)
    {
        /********************   check traffic cop  ************************************/
        $checkTrafficCop = $this->checkTrafficCop($request , $city);
        if(!$checkTrafficCop['status'])  return response()->json($checkTrafficCop);
        /******************************************************************************/
        $data = $request->validated();
        $city->update($data);
        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        try {
            $city = City::find($id);
            $checkDelete = $this->checkDelete($city ,$this->getRelations($city));
            if(!is_null($checkDelete)) {
                return responseJson(false, $checkDelete, [], 422);
            }
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
        $errors = null;
        switch ($option_id) {
            case 1 :
                City::whereIn('id', $ids)->update(['status' => 1]);
                break;
            case 2 :
                City::whereIn('id', $ids)->update(['status' => 0]);
                break;
            case 3 :
                $cities = City::whereIn('id' , $ids)->get();
                foreach ($cities as $city) {
                    $checkDelete = $this->checkDelete($city ,$this->getRelations($city));
                    if(!is_null($checkDelete)) {
                        $errors[] = $checkDelete;
                    }else {
                        $city->delete();
                    }
                }
                break;
        }
        if (count($errors) > 0) {
            array_unshift($errors, trans('error.error_in_execute_option'));
            return responseJson(false, implode('<hr>', $errors), [], 422);
        } else {
            return responseJson(true, trans('admin.update_success'), [], 200);
        }
    }

    // remote data
    public function get_remote_city(Request $request)
    {
        $country_id = $request->country_id;
        $cities = City::with('country')->Country($country_id);

        return DataTables::of($cities)
            ->addColumn('select_record', function ($model) {
                return view('admin.cities.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_status', function ($model) {
                return view('admin.cities.parts.status', ['id' => $model->id, 'status' => $model->status])->render();
            })->addColumn('actions', function ($model) {
                return view('admin.cities.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }

    public function getRemoteCountryCities($country_id) {
        $cities = $country_id == -1 ? [] :City::Active()->Country($country_id)->get();
        return responseJson(true, trans('admin.done'), [
            'cities' => $cities
        ], 200);
    }

}
