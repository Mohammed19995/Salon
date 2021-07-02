<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <meta charset="utf-8"/>
    <title>تأكيد الدخول</title>
    <meta name="description" content="Login page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>

    <link href="{{url('')}}/admin_assets/css/pages/login/classic/login-4.css?v=7.0.5" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/admin_assets/app/css/app.css" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="{{url('')}}/admin_assets/media/logos/favicon.ico"/>
    <style>
        .hidden {
            display: none!important;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root" id="app">
    <!--begin::Login-->
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
             style="background-image: url('{{url('')}}/admin_assets/media/bg/bg-3.jpg');">
            <div class="login-form text-center p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="{{url('')}}/admin_assets/media/logos/logo-letter-13.png" class="max-h-75px" alt=""/>
                    </a>
                </div>
                <div class="login-signin">
                    <div class="mb-20">
                        <h3>تأكيد دخولك للحساب</h3>
                        <div class="text-muted font-weight-bold">ادخل الرمز , لتأكيد الدخول</div>
                    </div>
                    <confrim-comp></confrim-comp>

                </div>
                <div id="kt_header"></div>
                <div id="kt_quick_user"></div>
            </div>
        </div>
    </div>
</div>

<script>
    window.admin = {!! Auth::guard('admin')->user() !!};
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
    window.get_translations = _translations[_locale].php;
    window.get_url = "{{url('')}}";
    window.locales = {!! $locales !!};
    window.default_file = "{{getPath('galleries' ,'true' , 'file.jpg')}}";
</script>

<script src="{{url('')}}/admin_assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
<script src="{{url('')}}/admin_assets/app/js/app.js"></script>

<script src="{{url('')}}/admin_assets/custom/js/auth/confirm_account.js"></script>

</body>
</html>