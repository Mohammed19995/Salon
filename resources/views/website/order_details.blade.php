@extends('website.layout')

@push('css')
    <link href="{{url('')}}/website/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('')}}/website/custom/css/order_details.css">

@endpush
@section('content')
    <div class="pay-main-content" id="vm_order_details">
        <order-details-comp :order_id="order_id" :can_edit="can_edit"></order-details-comp>
    </div>
@endsection

@push('js')
    <script>
        var order_id = {!! $order_id !!};
    </script>
    <script src="{{url('')}}/website/js/select2.min.js"></script>
    <script src="{{url('')}}/website/custom/js/orders/order_details.js"></script>
@endpush
