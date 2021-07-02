<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cureslife WholeSale</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('')}}/website/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('')}}/website/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('')}}/website/css/all.min.css">
    <link rel="stylesheet" href="{{url('')}}/website/css/style.css">
    <style>
        .hidden {
            display: none;
        !important;
        }
    </style>
    @stack('css')
</head>
<body>

<section class="header" id="vm_header">
    <header-comp :user="user" :search="search"></header-comp>
</section>
<section class="home">
    <div id="vm_sidebar">
        <sidebar-comp :user="user" :categories="categories" :latest_products="latest_products" :most_sales_products="most_sales_products"></sidebar-comp>
    </div>
    @include('website.includes.sidebar')
    @yield('content')
    <div id="vm_cart">
        <cart-comp></cart-comp>
    </div>
</section>
@include('website.includes.footer')

<script src="{{url('')}}/website/js/jquery-3.4.1.min.js"></script>
<script src="{{url('')}}/website/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/lazysizes@5.2.2/lazysizes.js"></script>
<script>
    var vm_product = null;
    window.get_url = "{{url('')}}";
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
    window.locales = ['ar', 'en'];
    window.get_translations = _translations[_locale].php;
    window.user = {!! request()->user !!};
</script>
<script src="{{url('')}}/website/js/website_app.js"></script>
<script src="{{url('')}}/website/custom/js/layout.js"></script>

@stack('js')
</body>
</html>
