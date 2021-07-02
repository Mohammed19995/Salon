@extends('admin.layout')

@push('css')

@endpush

@section('content')
    <div id="app">
        <p>Page content goes here...</p>
    </div>
@endsection

@push('js')
    <script>
        var vm = new Vue({
            el : '#app' ,

        });
    </script>
@endpush