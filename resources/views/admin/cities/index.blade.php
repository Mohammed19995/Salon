@extends('admin.layout')

@push('css')
    <link href="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div id="app">

        <city-comp :countries="countries" :data="data" :shock_event="shock_event" :add="add"></city-comp>

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.cities')}}</h2>
                </div>
                <div class="card-toolbar">
                    @check_role('add_city')
                    <a href="javascript:;" class="btn btn-success font-weight-bold mr-2 add-button">
                        <i class="fa fa-plus"></i>{{trans('admin.add')}}</a>
                    @endcheck_role
                </div>
            </div>
            <div class="card-body">

                <place-comp :countries="countries" col="col-sm-6"
                            :show_city="false" :show_neighborhood="false"
                            country_selector="select_filter_country" city_selector="select_filter_city" neighborhood_selector="select_filter_neighborhood"
                            type="#" :listen_to_emit="false" :add_all_option="true">
                </place-comp>

                <option-comp @emit-execute-option="emitExecuteOption" :options="options" :ids="ids"
                             :url="option_url">
                </option-comp>
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="city-table">
                    <thead>
                    <tr>
                        <th>
                            <span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all">
                                    <input type="checkbox" id="check_all">&nbsp;<span></span></label>
                            </span>
                        </th>
                        <th>{{trans('admin.name')}}</th>
                        <th>{{trans('admin.country')}}</th>
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
        var default_image = "{{getPath('cities' ,true)}}";
        var options = {!! $options !!};
        var countries = {!! $countries !!};
    </script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
    <script src="{{url('')}}/admin_assets/custom/js/cities/city.js"></script>
@endpush