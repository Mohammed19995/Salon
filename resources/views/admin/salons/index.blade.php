@extends('admin.layout')

@push('css')

    <style>
       .select2-container {
            width: 100%!important;
        }
       .select_phone_code {
           border-radius: 0!important;
       }

       .hidden {
           display: none;!important;
       }
    </style>

@endpush

@section('content')
    <div id="app">

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.salons')}}</h2>
                </div>
                <div class="card-toolbar">
                    @check_role('add_auction')
                    <a href="{{url('admin/salons/create')}}" class="btn btn-success font-weight-bold mr-2">
                        <i class="fa fa-plus"></i>{{trans('admin.add')}}</a>
                    @endcheck_role
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-4">
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
                    <div class="col-sm-6">
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
                             :url="option_url">
                </option-comp>

                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="salon-table">
                    <thead>
                    <tr>
                        <th>
                            <span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all">
                                    <input type="checkbox" id="check_all">&nbsp;<span></span></label>
                            </span>
                        </th>
                        <th>{{trans('admin.salon_id')}}</th>
                        <th>{{trans('admin.image')}}</th>
                        <th>{{trans('admin.name')}}</th>
                        <th>{{trans('admin.email')}}</th>
                        <th>{{trans('admin.phone')}}</th>
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
        var default_image = "{{getPath('salons' ,true)}}";
        var options = {!! $options !!};
        var countries = {!! $countries !!};
        var statuses = {!! $statuses !!}

    </script>

    <script src="{{url('')}}/admin_assets/custom/js/plugins/magnific-popup.min.js"></script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/salons/salon.js"></script>
@endpush