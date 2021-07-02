@extends('admin.layout')

@push('css')

@endpush

@section('content')
    @include('admin.includes.heading' , ['show' => true])
    <div id="app">
        <update-profile-comp default_image="{{getPath('admins' , true)}}" :countries="countries" :data="admin"></update-profile-comp>

    </div>

@endsection

@push('js')
    <script>
        var countries = {!! $countries !!};
    </script>
    <script src="{{url('')}}/admin_assets/custom/js/profile/service.js"></script>

@endpush