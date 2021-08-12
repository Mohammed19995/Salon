<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;
use App\Facades\Firebase\FirebaseNotificationFacade;
use App\Http\Requests\Admin\Slider\AddSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use App\Http\Requests\ExecuteOptionRequest;
use App\Models\Slider;
use App\Traits\Controller\CheckDeleteTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends HomeController
{
    use CheckDeleteTrait;
    
    public function __construct()
    {
        parent::__construct();

        
        self::$data['main_title'] = trans('admin.sliders');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.sliders'), 'url' => route('admin.sliders.index')],
        ];
        self::$data['active_menu'] = 'sliders';
        self::$data['sub_menu'] = '';

    }

    public function index()
    {
        parent::$data['options'] = $this->options(['active' , 'not_active' , 'delete']);
        return view('admin.sliders.index', parent::$data);
    }


    public function create()
    {

    }

    public function store(AddSliderRequest $request)
    {

        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, null, null, true);
        Slider::create($data);
        return responseJson(true, trans('admin.add_success'), [], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        /********************   check traffic cop  ************************************/
        $checkTrafficCop = $this->checkTrafficCop($request , $slider);
        if(!$checkTrafficCop['status'])  return response()->json($checkTrafficCop);
        /******************************************************************************/
        $data = $request->validated();
        $data['image_id'] = FileFacade::storeFileId($request->image, $slider, 'image_id', false);
        $slider->update($data);
        return responseJson(true, trans('admin.update_success'), [], 200);
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::find($id);
            $checkDelete = $this->checkDelete($slider ,$this->getRelations($slider));
            if(!is_null($checkDelete)) {
                return responseJson(false, $checkDelete, [], 422);
            }
            $slider->delete();
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
        $errors = [];
        switch ($option_id) {
            case 1 :
                Slider::whereIn('id', $ids)->update(['status' => 1]);
                break;
            case 2 :
                Slider::whereIn('id', $ids)->update(['status' => 0]);
                break;
            case 3 :
                $sliders = Slider::whereIn('id' , $ids)->get();
                foreach ($sliders as $slider) {
                    $checkDelete = $this->checkDelete($slider ,$this->getRelations($slider));
                    if(!is_null($checkDelete)) {
                        $errors[] = $checkDelete;
                    }else {
                        $slider->delete();
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
    public function getRemoteSliders(Request $request)
    {
        $sliders = Slider::query();

        return DataTables::of($sliders)
            ->addColumn('select_record', function ($model) {
                return view('admin.sliders.parts.select_record', ['id' => $model->id])->render();
            })->addColumn('show_image', function ($model) {
                return view('admin.sliders.parts.show_image', ['image' => $model->image])->render();
            })->addColumn('show_status', function ($model) {
                return view('admin.sliders.parts.status', ['id' => $model->id, 'status' => $model->status])->render();
            })->addColumn('actions', function ($model) {
                return view('admin.sliders.parts.actions', ['id' => $model->id])->render();
            })->escapeColumns(['*'])->make(true);
    }


}
