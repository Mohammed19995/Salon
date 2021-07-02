@extends('website.layout')

@push('css')
    <link rel="stylesheet" href="{{url('')}}/website/custom/css/my_account.css">
@endpush
@section('content')
    <div class="pay-main-content" id="vm_my_account">
        <my-account-comp :user="user"></my-account-comp>
    </div>
@endsection

@push('js')
    <script>
        var user = {!! $user !!};
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
    <script src="{{url('')}}/website/custom/js/account/my_account.js"></script>
@endpush
