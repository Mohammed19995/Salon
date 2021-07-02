@extends('admin.layout')

@push('css')

@endpush

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <video controls autoplay style="width: 100%;height: 400px;"></video>
            </div>
            <div class="col-sm-2"></div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{url('')}}/live/socket_io.js"></script>
    <script src="{{url('')}}/live/watch.js"></script>
@endpush