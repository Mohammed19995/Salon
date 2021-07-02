@extends('admin.layout')

@push('css')
    <link href="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{url('')}}/admin_assets/custom/css/plugins/magnific-popup.min.css">

     <style>
         .select2-container {
             width: 100%!important;
         }
         .select_phone_code {
             border-radius: 0!important;
         }
     </style>
@endpush

@section('content')
    @include('admin.includes.heading' , ['show' => false])
    <div id="app">

        <admin-comp :countries="countries" :data="data" :shock_event="shock_event"
                   :add="add" :file1_data="file1_data" :roles="roles">
        </admin-comp>

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.admins')}}</h2>
                </div>
                <div class="card-toolbar">
                    <a href="javascript:;" class="btn btn-success font-weight-bold mr-2 add-button">
                        <i class="fa fa-plus"></i>{{trans('admin.add')}}</a>
                </div>
            </div>
            <div class="card-body">

                <option-comp @emit-execute-option="emitExecuteOption" :options="options" :ids="ids"
                             :url="option_url"></option-comp>
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="admin-table">
                    <thead>
                    <tr>
                        <th>
                            <span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all">
                                    <input type="checkbox" id="check_all">&nbsp;<span></span></label>
                            </span>
                        </th>
                        <th>{{trans('admin.image')}}</th>
                        <th>{{trans('admin.name')}}</th>
                        <th>{{trans('admin.email')}}</th>
                        <th>{{trans('admin.phone')}}</th>
                        <th>{{trans('admin.status')}}</th>
                        <th>{{trans('admin.date')}}</th>
                        <th>{{trans('admin.control')}}</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        var default_image = "{{getPath('admins' ,'true')}}";
        var countries = {!! $countries !!};
        var options = {!! $options !!};
        var roles = {!! $roles !!};

    </script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
    <script src="{{url('')}}/admin_assets/custom/js/plugins/magnific-popup.min.js"></script>

    <script src="{{url('')}}/admin_assets/custom/js/admins/list.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/admins/admin.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/admins/service.js"></script>
@endpush