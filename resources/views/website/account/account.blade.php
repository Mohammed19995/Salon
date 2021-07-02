@extends('website.layout')

@push('css')
    <link rel="stylesheet" href="{{url('')}}/website/custom/css/account.css">
@endpush
@section('content')
    <div class="account-main-content" id="vm_account">
        <account-comp></account-comp>
    </div>
@endsection

@push('js')
    <script src="{{url('')}}/website/custom/js/account/account.js"></script>
@endpush
