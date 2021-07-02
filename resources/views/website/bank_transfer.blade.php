@extends('website.layout')

@push('css')
    <link rel="stylesheet" href="{{url('')}}/website/custom/css/bank.css">
@endpush
@section('content')
    <div class="pay-main-content" id="vm_bank_transfer">
        <bank-transfer-comp :banks="banks"></bank-transfer-comp>
    </div>
@endsection

@push('js')
    <script>
        var banks = {!! $banks !!};
    </script>
    <script src="{{url('')}}/website/custom/js/bank/bank_transfer.js"></script>
@endpush
