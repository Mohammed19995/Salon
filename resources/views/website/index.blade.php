@extends('website.layout')

@push('css')


@endpush
@section('content')
    <div class="main-content" id="vm_index">
        <div class="container">

        </div>
    </div>
@endsection

@push('js')
    <script>

        axios.get(get_url + "/api/profile").then(response => {
            console.log(response.data);
        });


    </script>
@endpush
