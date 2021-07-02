<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;
use App\Http\Requests\Admin\City\AddCityRequest;
use App\Http\Requests\Admin\City\UpdateCityRequest;
use App\Http\Requests\ExecuteOptionRequest;
use App\Http\Resources\Category\CategoryDTFResource;
use App\Models\City;
use App\Models\Country;
use App\Models\Place;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Grimzy\LaravelMysqlSpatial\Types\LineString;

class PlaceController extends HomeController
{

    public function __construct()
    {
        parent::__construct();


    }

    public function index()
    {
        $lat = "25.28400267326366";
        $lng = "-78.52971875";
        $places = Place::whereRaw("ST_Contains( ST_GeomFromText(ST_AsText(area), 4326), ST_GeomFromText( 'POINT($lng $lat )' , 4326) )")->get();
        return $places;

        $polygon = new Polygon([new LineString([
            new Point(25.774, -80.19),
            new Point(18.466,  -66.118),
            new Point(32.321, -64.757),
            new Point(25.774, -80.19),
        ])], 4326);
        $place = Place::create([
            'name' => ['ar' => 'test3', 'en' => 'test3'],
            'area' => $polygon
        ]);
        return $place;
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
        $data = $request->validated();
        $city->update($data);
        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        try {
            City::destroy($id);
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
                City::whereIn('id', $ids)->update(['status' => 1]);
                break;
            case 2 :
                City::whereIn('id', $ids)->update(['status' => 0]);
                break;
            case 3 :
                City::destroy($ids);
                break;
        }
        return responseJson(true, trans('admin.update_success'), [], 200);

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

    public function getRemoteCountryCities($country_id)
    {
        $cities = $country_id == -1 ? [] : City::Active()->Country($country_id)->get();
        return responseJson(true, trans('admin.done'), [
            'cities' => $cities
        ], 200);
    }

}
