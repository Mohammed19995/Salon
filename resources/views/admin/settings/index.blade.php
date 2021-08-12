@extends('admin.layout')

@push('css')
@endpush

@section('content')
    <div id="app">

        <setting-comp :data="settings"></setting-comp>
    </div>

@endsection

@push('js')
    <script>
        var default_image = "{{getPath('nationalities' ,true)}}";
        var place = {!! $place !!};
        var phone = {!! $phone !!};
        var email = {!! $email !!};
        var facebook = {!! $facebook !!};
        var twitter = {!! $twitter !!};
        var instagram = {!! $instagram !!};
        var snapchat = {!! $snapchat !!};
        var privacy_policy = {!! $privacy_policy !!};
        var about_us = {!! $about_us !!};
        var about_app = {!! $about_app !!};

    </script>
    <script src="{{url('')}}/admin_assets/js/pages/crud/forms/editors/summernote.js?v=7.0.5"></script>
    <script src="{{url('')}}/admin_assets/custom/js/settings/setting.js"></script>
@endpush