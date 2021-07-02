@extends('admin.layout')

@push('css')
    <link href="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{url('')}}/admin_assets/custom/css/plugins/magnific-popup.min.css">

@endpush

@section('content')
    @include('admin.includes.heading' , ['show' => true])
    <div id="app">

        <gallery-form-comp :data="data" :shock_event="shock_event" :add="add" :file1_data="file1_data"  :types="types"></gallery-form-comp>
        <div class="card card-custom gutter-b show-form hidden">
            <div class="card-header">
                <h3 class="card-title">3 Columns Form Layout</h3>
            </div>
        </div>


        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.galleries')}}</h2>
                </div>
                <div class="card-toolbar">
                    <a href="javascript:;" class="btn btn-success font-weight-bold mr-2 add-button">
                        <i class="fa fa-plus"></i>إضافة</a>
                </div>
            </div>
            <div class="card-body">
                <show-gallery-comp  @edit-gallery="editGallery" @delete-gallery="deleteGallery" :types="types"></show-gallery-comp>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        var default_image = "{{getPath('galleries' ,'true')}}";
        var types = {!! $types !!};
    </script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
    <script src="{{url('')}}/admin_assets/custom/js/plugins/magnific-popup.min.js"></script>

    <script src="{{url('')}}/admin_assets/custom/js/galleries/gallery.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/galleries/service.js"></script>
@endpush