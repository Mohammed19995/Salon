@extends('admin.layout')

@push('css')

@endpush

@section('content')
    @include('admin.includes.heading' , ['show' => false])
    <div id="app">
        <country-comp :data="data" :shock_event="shock_event" :add="add" :file1_data="file1_data" ></country-comp>

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.countries')}}</h2>
                </div>
            </div>
            <div class="card-body">

                <option-comp @emit-execute-option="emitExecuteOption" :options="options" :ids="ids"
                             :url="option_url"></option-comp>
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="country-table">
                    <thead>
                    <tr>
                        <th>
                            <span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all">
                                    <input type="checkbox" id="check_all">&nbsp;<span></span></label>
                            </span>
                        </th>
                        <th>{{trans('admin.image')}}</th>
                        <th>{{trans('admin.name')}}</th>
                        <th>{{trans('admin.country_code')}}</th>
                        <th>{{trans('admin.phone_code')}}</th>
{{--                        <th>{{trans('admin.currency')}}</th>--}}
                        <th>{{trans('admin.status')}}</th>
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
        var default_image = "{{getPath('countries' ,'true')}}";
        var options = {!! $options !!};
    </script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/plugins/magnific-popup.min.js"></script>


    <script src="{{url('')}}/admin_assets/custom/js/countries/list.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/countries/country.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/countries/service.js"></script>


@endpush