@extends('admin.layout')

@push('css')
    <link href="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.5" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div id="app">

        <state-comp :countries="countries" :data="data" :shock_event="shock_event" :add="add"></state-comp>

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h2 class="card-label">{{trans('admin.states')}}</h2>
                </div>
                <div class="card-toolbar">
                    @check_role('add_state')
                    <a href="javascript:;" class="btn btn-success font-weight-bold mr-2 add-button">
                        <i class="fa fa-plus"></i>{{trans('admin.add')}}</a>
                    @endcheck_role
                </div>
            </div>
            <div class="card-body">

                <option-comp @emit-execute-option="emitExecuteOption" :options="options" :ids="ids"
                             :url="option_url">
                </option-comp>
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="state-table">
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
        var default_image = "{{getPath('states' ,true)}}";
        var options = {!! $options !!};
        var countries = {!! $countries !!};
    </script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
    <script src="{{url('')}}/admin_assets/custom/js/states/state.js"></script>
@endpush