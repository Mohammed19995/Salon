@extends('admin.layout')

@push('css')
    <link href="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div id="app">


        <div class="card card-custom mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <h2 class="card-label">{{trans('admin.auction_details')}}</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{url('admin/auctions/'.$auction->id."/edit")}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>{{trans('admin.edit')}}</a>
                    </div>
                    <div class="col-sm-8">
                        <option-comp @emit-execute-option="emitExecuteOption" :options="options" :ids="ids"
                                     :url="option_url">
                        </option-comp>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-custom mb-3">
            <div class="card-body">
                <auction-details-comp :auction="auction"></auction-details-comp>
            </div>
        </div>
        <div class="card card-custom">
            <div class="card-body">
                <div class="card-header mb-3" style="padding: 0;">
                    <div class="card-title">
                        <h3 class="card-label">{{__('admin.auction_user_prices')}}</h3>
                    </div>
                </div>
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="auction-prices-table">
                    <thead>
                    <tr>
                        <th>{{trans('admin.image')}}</th>
                        <th>{{trans('admin.name')}}</th>
                        <th>{{trans('admin.email')}}</th>
                        <th>{{trans('admin.phone')}}</th>
                        <th>{{trans('admin.price')}}</th>
                        <th>{{trans('admin.current_price')}}</th>
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
        var default_image = "{{getPath('auctions' ,true)}}";
        var options = {!! $options !!};
        var auction = {!! $auction !!};
    </script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
    <script src="{{url('')}}/admin_assets/custom/js/plugins/magnific-popup.min.js"></script>
    <script src="{{url('')}}/admin_assets/plugins/custom/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/auctions/auction_details.js"></script>
@endpush