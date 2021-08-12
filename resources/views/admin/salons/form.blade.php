@extends('admin.layout')

@push('css')
    <link href="{{url('')}}/admin_assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
    <style>
        .select2-container {
            width: 100%!important;
        }
        .select_phone_code {
            border-radius: 0!important;
        }

        .hidden {
            display: none;!important;
        }
    </style>

@endpush

@section('content')
    <div id="app">
        <salon-comp  :data="data" :shock_event="shock_event" :add="add" :countries="countries"
                     :categories="categories" :branches="branches" :file1_data="file1_data"></salon-comp>
    </div>

@endsection

@push('js')
    <script>
        var default_image = "{{getPath('salons' ,true)}}";
        var countries = {!! $countries !!};
        var categories = {!! $categories !!};
        var branches = {!! $branches !!};
        var salon = {!! $salon !!};
    </script>
    <script src="{{url('')}}/admin_assets/custom/js/salons/salon_form.js"></script>
@endpush