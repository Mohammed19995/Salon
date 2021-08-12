<?php

namespace App\Http\Controllers\Admin\Salon;


use App\Facades\FileFacade;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Requests\Admin\Salon\AddSalonRequest;
use App\Http\Requests\Admin\Salon\UpdateSalonRequest;
use App\Http\Requests\ExecuteOptionRequest;

use App\Models\Country;
use App\Models\Salon;
use App\Models\SalonBranch;
use App\Traits\Controller\CheckDeleteTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;


class SalonController extends HomeController
{
    use CheckDeleteTrait;

    public function __construct()
    {
        parent::__construct();

        self::$data['main_title'] = trans('admin.salons');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.salons'), 'url' => route('admin.salons.index')],
        ];
        self::$data['active_menu'] = 'salons';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {
        parent::$data['countries'] = Country::Active()->get();
        parent::$data['branches'] = SalonBranch::all();
        parent::$data['statuses'] = json_encode(salonStatusData());
        parent::$data['options'] = $this->options(['active','not_active','delete']);
        return view('admin.salons.index', parent::$data);
    }


    public function create()
    {
        $this->getSalonData();
        return view('admin.salons.form', parent::$data);
    }

    public function store(AddSalonRequest $request)
    {
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, null, null, true);
        $salon = Salon::create(Arr::only($data , (new Salon())->getFillable()));
        $salon->categories()->sync($data['category_ids']);
        $salon->employees()->sync($data['employee_ids']);
        $salon->working_times()->createMany($data['working_times']);
        return responseJson(true, trans('admin.add_success'), [], 200);
    }


    public function show($id)
    {
        $auction = $this->auction->salons()->find($id);
        $auction->show_status = salonstatusData()[$auction->status]['text'];
        $auction->show_status_class = salonstatusData()[$auction->status]['class'];

        $auction->show_type = auctionTypeData()[$auction->type]['text'];
        $auction->show_type_class = auctionTypeData()[$auction->type]['class'];

        parent::$data['auction'] = $auction;
        parent::$data['options'] = $this->options(['active','not_active', 'delete']);
        return view('admin.salons.auction_details', parent::$data);

    }

    public function edit($id)
    {
        $salon = Salon::GeneralAdminData()->find($id);
        $salon->category_ids = $salon->categories->pluck('id')->toArray();
        $salon->employee_ids = $salon->employees->pluck('id')->toArray();;
        $this->getSalonData($salon);
        return view('admin.salons.form', parent::$data);
    }

    public function update(UpdateSalonRequest $request, Salon $salon)
    {
        /********************   check traffic cop  ************************************/
        $checkTrafficCop = $this->checkTrafficCop($request, $salon);
        if (!$checkTrafficCop['status']) return response()->json($checkTrafficCop);
        /******************************************************************************/

        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, $salon, 'image_id', false);
        $salon->update(Arr::only($data , (new Salon())->getFillable()));
        $salon->categories()->sync($data['category_ids']);
        $salon->employees()->sync($data['employee_ids']);
        foreach ($request->working_times as $working_time) {
            $salon->working_times()->updateOrCreate(
                ['salon_id' => $salon->id , 'day_id' => $working_time['day_id']],
                $working_time
            );
        }
        $salon->touch();
        return responseJson(true, trans('admin.update_success'), [
            'updated_at' => $salon->updated_at
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $salon = Salon::find($id);
            $checkDelete = $this->checkDelete($salon ,$this->getRelations($salon));
            if(!is_null($checkDelete)) {
                return responseJson(false, $checkDelete, [], 422);
            }
            $salon->delete();
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
        $salons = Salon::whereIn('id', $ids)->get();

        $errors = [];
        foreach ($salons as $salon) {
            switch ($option_id) {
                case 1 :
                    Salon::whereIn('id', $ids)->update(['status' => 1]);
                    break;
                case 2 :
                    Salon::whereIn('id', $ids)->update(['status' => 0]);
                    break;
                case 3 :
                    $checkDelete = $this->checkDelete($salon ,$this->getRelations($salon));
                    if(!is_null($checkDelete)) {
                        $errors[] = $checkDelete;
                    }else {
                        $salon->delete();
                    }
                    break;
            }
        }
        if (count($errors) > 0) {
            array_unshift($errors, trans('error.error_in_this_salons'));
            return responseJson(false, implode('<hr>', $errors), [], 422);
        } else {
            return responseJson(true, trans('admin.update_success'), [], 200);
        }

    }

    // remote data
    public function getRemoteSalons(Request $request)
    {
        $country_id = $request->country_id;
        $salons = Salon::GeneralAdminData()
            ->Status($request->status)
            ->FilterDate('salons.created_at', $request->start_date, $request->end_date)
            ->Country($country_id);;

        if($country_id != -1 && !empty($country_id) && !is_null($country_id)) {
            $salons = $salons->City($request->city_id);
        }
        return DataTables::of($salons)

            ->addColumn('select_record', function ($model) {
                return view('admin.salons.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_image', function ($model) {
                return view('admin.salons.parts.show_image', ['image' => $model->image])->render();
            })->addColumn('phone_with_code', function ($model) {
                return $model->phone_code . "-" . $model->phone;
            })->addColumn('show_status', function ($model) {
                return view('admin.salons.parts.status', ['id' => $model->id, 'status' => $model->status, 'reject_reason' => $model->reject_reason])->render();
            })->addColumn('actions', function ($model) {
                return view('admin.salons.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }



    // helper
    public function getSalonData($salon = -1)
    {
        parent::$data['countries']  = Country::Active()->get();
        parent::$data['categories'] = collect(Cache::get('categories_cache'))->whereNull('parent_id');
        parent::$data['branches']   = SalonBranch::all();
        parent::$data['salon']      = $salon;
    }
}
