@extends('website.layout')

@push('css')
    <link rel="stylesheet" href="{{url('')}}/website/custom/css/checkout.css">
    <style>
        .network-pay , .cash-pay , .transfer-pay{
            display: flex;
            align-items: center;
        }
        .network-pay p , .cash-pay p , .transfer-pay p{
            margin: 0;
            padding: 10px;
            line-height: 2;
            color: #707070;
            font-size: 14px;
            font-family: inherit;
        }
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
    </style>
@endpush
@section('content')
    <div class="pay-main-content" id="vm_checkout">
        <checkout-comp :user="user"></checkout-comp>
    </div>
@endsection

@push('js')
    <script>
        var $user = {!! $user !!};
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
    <script src="{{url('')}}/website/custom/js/checkout/checkout.js"></script>
@endpush
