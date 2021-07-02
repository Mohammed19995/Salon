<?php

namespace App\Http\Controllers\Admin;

use App\Facades\FileFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gallery\AddGalleryRequest;
use App\Models\Gallery;
use App\Models\GalleryType;
use App\Traits\Validation\MultiLangValidationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GalleryController extends HomeController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('check_role:view_gallery|add_gallery|edit_gallery|delete_gallery', ['only' => ['index']]);
        $this->middleware('check_role:add_gallery', ['only' => ['store']]);
        $this->middleware('check_role:edit_gallery', ['only' => ['update']]);
        $this->middleware('check_role:delete_gallery', ['only' => ['destroy']]);

        self::$data['main_title'] = trans('admin.galleries');
        self::$data['breadcrumbs'] = [
            ['name' => trans('admin.home'), 'url' => url('admin')],
            ['name' => trans('admin.galleries'), 'url' => route('admin.galleries.index')],
        ];

        self::$data['active_menu'] = 'galleries';
        self::$data['sub_menu'] = '';
    }
    public function index()
    {
        parent::$data['types'] = GalleryType::all();
        return view('admin.galleries.index', parent::$data);

    }

    public function create()
    {


    }

    public function store(AddGalleryRequest $request)
    {
        $data = $request->validated();
        $galleries = [];
        $files = $request->src;
        $files = is_array($files) ? $files : [$files];
        foreach ($files as $src) {
            $src_path = FileFacade::storeFile($src ,'galleries' , null , null , true);
            $data['name'] = $data['name'] ??  getMultiLangField($src->getClientOriginalName());
            $data['src'] = $src_path;
            $data['size'] = File::size(getUploadsPath($src_path));
            $data['mime_type'] = File::mimeType(getUploadsPath($src_path));
            $galleries[] = Gallery::create($data);
        }

        return responseJson(true, trans('admin.add_success'), [
            'galleries' => $galleries
        ], 200);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(AddGalleryRequest $request, Gallery $gallery)
    {
        $data = $request->validated();

        $src_path = FileFacade::storeFile($request->src ,'galleries' , $gallery , 'src' , false);

        $data['src'] = $src_path;
        $data['size'] = File::size(getUploadsPath($src_path));
        $data['mime_type'] = File::mimeType(getUploadsPath($src_path));

        $gallery->update($data);
        return responseJson(true, trans('admin.update_success'), [
            'gallery' => $gallery
        ], 200);
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        try {
            $gallery->delete();
            return responseJson(true, trans('admin.done_delete'), [], 200);

        } catch (\Exception $e) {
            return responseJson(false, trans('error.image_is_used'), [], 200);

        } catch (\Error $e) {
            return responseJson(false, $e->getMessage(), [], 200);

        }
    }

    // help function
    public function get_remote_gallery(Request $request) {
       $galleries = Gallery::latest()->Search($request->search)
           ->Type($request->type_id)->fileType($request->file_type)
           ->paginate($request->paginate ?? 24);
       return $galleries;
    }
}
