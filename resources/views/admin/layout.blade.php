<!DOCTYPE html>
<html lang="en" direction="rtl" dir="rtl" style="direction: rtl">

<head>
    
    <meta charset="utf-8"/>
    <title>Salon | Control Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Page with empty content"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>

    {{-- admin_app.css --}}
    <link href="{{url('')}}/admin_assets/app/css/app.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/admin_assets/custom/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{url('')}}/admin_assets/media/logos/favicon.ico"/>

    @stack('css')
</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="index.html">
        <img alt="Logo" src="{{url('')}}/admin_assets/media/logos/logo-light.png"/>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>

    </div>
    <!--end::Toolbar-->
</div>
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

        @include('admin.includes.sidebar')
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            @include('admin.includes.header')
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                @include('admin.includes.heading' , ['show' => true])
                <div class="d-flex flex-column-fluid content-parent">
                    <!--begin::Container-->
                    <div class="container">
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
            </div>
            @include('admin.includes.footer')
        </div>
    </div>
</div>

<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40" style="">
        <h3 class="font-weight-bold m-0">User Profile </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5 scroll ps ps--active-y" style="height: 251px; overflow: hidden;">

        <show-profile-comp :admin="admin" logout="{{route('admin.logout')}}"></show-profile-comp>
        <div class="separator separator-dashed mt-8 mb-5"></div>

        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
            <a href="{{route('admin.profile')}}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"></rect>
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
											</g>
										</svg>
                                        <!--end::Svg Icon-->
									</span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">{{__('admin.my_profile')}}</div>
                        <div class="text-muted">{{__('admin.update_my_profile')}}</div>
                    </div>
                </div>
            </a>
            <!--end:Item-->

            <!--end:Item-->
        </div>
        <!--end::Nav-->
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 251px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 71px;"></div></div></div>
    <!--end::Content-->
</div>

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                              fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
</div>
<!--end::Scrolltop-->


{{-- firebase  --}}
{{--<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>--}}
{{--<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-firestore.js"></script>--}}

<script>
    window.admin = {!! Auth::guard('admin')->user() !!};
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
    window.get_translations = _translations[_locale].php;
    window.get_url = "{{url('')}}";
    window.locales = {!! $locales !!};
    window.default_file = "{{getPath('galleries' ,'true' , 'file.jpg')}}";
    window.google_map_key = "{{env('GOOGLE_MAP_KEY')}}";
    window.days = {!! $days !!};
//
//    firebase.initializeApp({
//        apiKey: "AIzaSyDp3ZFryYztq9sYyEbtOxOlcO3bZ2OAnV0",
//        authDomain: "lara7-a19df.firebaseapp.com",
//        databaseURL: "https://lara7-a19df.firebaseio.com",
//        projectId: "lara7-a19df",
//        storageBucket: "lara7-a19df.appspot.com",
//        messagingSenderId: "1024028926530",
//        appId: "1:1024028926530:web:a73967808233d5e4b9c3db",
//        measurementId: "G-GEZKPJRX9G"
//    });
//    window.firestore_db = firebase.firestore();

</script>
<script src="{{url('')}}/admin_assets/plugins/global/plugins.bundle.min.js?v=7.0.5"></script>
<script src="{{url('')}}/admin_assets/app/js/app.js"></script>



@stack('js')

</body>

</html>
