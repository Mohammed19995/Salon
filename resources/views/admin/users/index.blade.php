@extends('admin.layout')

@push('css')
    <link href="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{url('')}}/admin_assets/custom/css/plugins/magnific-popup.min.css">
    <style>
        .select_phone_code {
            border-radius: 0 !important;
        }
    </style>
@endpush

@section('content')
    @include('admin.includes.heading' , ['show' => false])
    <div id="app">

        <user-comp :countries="countries" :types="types" :data="data" :shock_event="shock_event"
                   :add="add" :file1_data="file1_data">
        </user-comp>

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.users')}}</h2>
                </div>
                <div class="card-toolbar">
                    @check_role('add_user')
                        <a href="javascript:;" class="btn btn-success font-weight-bold mr-2 add-button">
                            <i class="fa fa-plus"></i>إضافة</a>
                    @endcheck_role
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label>{{__('admin.select_status') }}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker" id="select_filter_status"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_status')">
                                <option value="-1">{{__('admin.all')}}</option>
                                <option v-for="status in statuses" :value="status.id" v-text="status.text"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>{{__('admin.select_phone_code_status') }}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker" id="select_filter_phone_code_status"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_phone_code_status')">
                                <option value="-1">{{__('admin.all')}}</option>
                                <option v-for="phone_code_status in phone_code_statuses" :value="phone_code_status.id"
                                        v-text="phone_code_status.text"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label>{{__('admin.select_range_data') }}</label>
                        <div class="col-sm-12">
                            <div class="input-daterange input-group" id="kt_datepicker_5">
                                <input type="text" class="form-control" name="start" id="start_date"
                                       autocomplete="off"/>
                                <div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-arrow-alt-circle-left"></i>
															</span>
                                </div>
                                <input type="text" class="form-control" name="end" id="end_date" autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label></label>
                        <button type="button" style="width: 100%" :disabled="filter_loading" @click="filterData"
                                class="btn btn-primary"
                                :class="filter_loading ? 'spinner spinner-white spinner-left' : ''">
                            {{__('admin.apply_option')}}
                        </button>
                    </div>
                </div>
                <place-comp :countries="countries" col="col-sm-6"
                            :show_city="true" :show_neighborhood="false"
                            country_selector="select_filter_country" city_selector="select_filter_city"
                            neighborhood_selector="select_filter_neighborhood"
                            type="#" :listen_to_emit="false" :add_all_option="true">
                </place-comp>

                <option-comp @emit-execute-option="emitExecuteOption" :options="options" :ids="ids"
                             :url="option_url"></option-comp>
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="user-table">
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
                        <th>{{trans('admin.code')}}</th>
                        <th>{{trans('admin.country')}}</th>
                        <th>{{trans('admin.city')}}</th>
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
        var default_image = "{{getPath('users' ,'true')}}";
        var countries = {!! $countries !!};
        var options = {!! $options !!};
        var statuses = {!! $statuses !!};
        var types = {!! $types !!};
        var phone_code_statuses = {!! $phone_code_statuses !!};
    </script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
    <script src="{{url('')}}/admin_assets/custom/js/plugins/magnific-popup.min.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/users/user.js"></script>
@endpush
