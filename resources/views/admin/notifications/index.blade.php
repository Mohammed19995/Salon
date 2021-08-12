@extends('admin.layout')

@push('css')
    <style>
        .select_phone_code {
            border-radius: 0!important;
        }
        .select2-container {
            width: 100%!important;
        }
    </style>
@endpush

@section('content')
    @include('admin.includes.heading' , ['show' => false])

    <div id="app">
        @include('admin.notifications.parts.users')

        <notification-comp :shock_event="shock_event" :add="add"
        :types="types" :statuses="statuses" :phone_code_statuses="phone_code_statuses" :countries="countries"></notification-comp>

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.notifications')}}</h2>
                </div>
                <div class="card-toolbar">
                    @check_role('add_notification')
                    <a href="javascript:;" class="btn btn-success font-weight-bold mr-2 add-button">
                        <i class="fa fa-plus"></i>إضافة</a>
                    @endcheck_role
                </div>
            </div>
            <div class="card-body">

                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="notification-table">
                    <thead>
                    <tr>

                        <th>{{trans('admin.title_ar')}}</th>
                        <th>{{trans('admin.title_en')}}</th>
                        <th>{{trans('admin.message_ar')}}</th>
                        <th>{{trans('admin.message_en')}}</th>
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
        var default_image = "{{getPath('users' ,'true')}}";
        var options = {!! $options !!};
        var countries = {!! $countries !!};
        var options = {!! $options !!};
        var statuses = {!! $statuses !!};
        var types = {!! $types !!};
        var phone_code_statuses = {!! $phone_code_statuses !!};
    </script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/plugins/magnific-popup.min.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/notifications/notification.js"></script>
@endpush
