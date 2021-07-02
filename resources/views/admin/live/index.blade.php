
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
        <div class="row mt-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
                <button :disabled="camera" @click="openCamera"
                        class="btn btn-success">Open Camera</button>

                <button :disabled="!camera" @click="closeCamera"
                        class="btn btn-success">Close Camera</button>

                <button :disabled="live || !camera" @click="startLive"
                        class="btn btn-primary">Start Live</button>

                <button :disabled="!live" @click="endLive"
                        class="btn btn-danger">End Live</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
                <a style="font-size: 17px" target="_blank" :class="live ? '': 'hidden'" href="{{route('admin.live.watch')}}">{{route('admin.live.watch')}}</a>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{url('')}}/live/socket_io.js"></script>
    <script src="{{url('')}}/live/broadcast.js"></script>
@endpush