@extends('website.layout')

@push('css')
    <link rel="stylesheet" href="{{url('')}}/website/custom/css/bank.css">
@endpush
@section('content')
    <div class="pay-main-content" id="vm_reset_password">
        <reset-password-comp></reset-password-comp>
    </div>
@endsection

@push('js')
    <script src="{{url('')}}/website/custom/js/auth/reset_password.js"></script>
@endpush
