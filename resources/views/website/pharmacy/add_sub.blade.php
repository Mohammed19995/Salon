@extends('website.layout')

@push('css')
    <link rel="stylesheet" href="{{url('')}}/website/custom/css/pharmacy.css">
    <style>
        #map {
            height: 140px;
        }
        .map-input input{
            border-radius: 0 !important;
        }
        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 29%;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 235px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }
        .hidden {
            display: none;!important;
        }
    </style>
@endpush
@section('content')
    <div class="sub-pharmacy-main-content" id="vm_pharmacy">
        <add-sub-pharmacy-comp :edit="edit" :get_pharmacy="get_pharmacy"></add-sub-pharmacy-comp>
    </div>
@endsection

@push('js')
    <script>
        var edit = {!! $edit !!};
        var get_pharmacy = {!! $pharmacy !!};

    </script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>

    <script src="{{url('')}}/website/custom/js/pharmacy/pharmacy.js"></script>
@endpush
