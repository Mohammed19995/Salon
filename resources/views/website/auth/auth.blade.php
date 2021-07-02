<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cureslife WholeSale</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('')}}/website/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('')}}/website/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('')}}/website/css/all.min.css">
    <link rel="stylesheet" href="{{url('')}}/website/css/style.css">
    <style>
        #map {
            height: 140px;
        }
        .map-input input{
            border-radius: 0 !important;
        }
        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 29%;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 235px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }
        .hidden {
            display: none;!important;
        }
    </style>
</head>
<body>
<section class="Login">
    <div class="forms-container" id="vm_auth">
       <auth-comp></auth-comp>
    </div>
</section>

<script src="{{url('')}}/website/js/jquery-3.4.1.min.js"></script>
<script src="{{url('')}}/website/js/bootstrap.min.js"></script>
<script>
    var vm_product = null;
    window.get_url = "{{url('')}}";
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
    window.locales = ['ar' , 'en'];
    window.get_translations = _translations[_locale].php;
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>

<script src="{{url('')}}/website/js/website_app.js"></script>
<script src="{{url('')}}/website/custom/js/auth/auth.js"></script>

</body>
</html>
