<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <meta charset="utf-8"/>
    <title>Salon | Control Panel</title>
    <meta name="description" content="Login page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>

    <link href="{{url('')}}/admin_assets/css/pages/login/classic/login-4.css?v=7.0.5" rel="stylesheet" type="text/css"/>

    <link href="{{url('')}}/admin_assets/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/admin_assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/admin_assets/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css"/>

    <link href="{{url('')}}/admin_assets/css/themes/layout/header/base/light.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/admin_assets/css/themes/layout/header/menu/light.css?v=7.0.5" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/admin_assets/css/themes/layout/brand/dark.css?v=7.0.5" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/admin_assets/css/themes/layout/aside/dark.css?v=7.0.5" rel="stylesheet" type="text/css"/>
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
                        <h3>لوحة التحكم</h3>
                        <div class="text-muted font-weight-bold">ادخل البيانات للدخول الي لوحة التحكم</div>
                    </div>
                    <login-comp></login-comp>

                </div>
                <!--end::Login Sign in form-->
                <!--begin::Login Sign up form-->
                <div class="login-signup">
                    <div class="mb-20">
                        <h3>Sign Up</h3>
                        <div class="text-muted font-weight-bold">Enter your details to create your account</div>
                    </div>
                    <form class="form" id="kt_login_signup_form">
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                   placeholder="Fullname" name="fullname"/>
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                   placeholder="Email" name="email" autocomplete="off"/>
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                   placeholder="Password" name="password"/>
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                   placeholder="Confirm Password" name="cpassword"/>
                        </div>
                        <div class="form-group mb-5 text-left">
                            <div class="checkbox-inline">
                                <label class="checkbox m-0">
                                    <input type="checkbox" name="agree"/>
                                    <span></span>I Agree the
                                    <a href="#" class="font-weight-bold ml-1">terms and conditions</a>.</label>
                            </div>
                            <div class="form-text text-muted text-center"></div>
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button id="kt_login_signup_submit"
                                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up
                            </button>
                            <button id="kt_login_signup_cancel"
                                    class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign up form-->
                <!--begin::Login forgot password form-->
                <div class="login-forgot">
                    <div class="mb-20">
                        <h3>Forgotten Password ?</h3>
                        <div class="text-muted font-weight-bold">Enter your email to reset your password</div>
                    </div>
                    <form class="form" id="kt_login_forgot_form">
                        <div class="form-group mb-10">
                            <input class="form-control form-control-solid h-auto py-4 px-8" type="text"
                                   placeholder="Email" name="email" autocomplete="off"/>
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button id="kt_login_forgot_submit"
                                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request
                            </button>
                            <button id="kt_login_forgot_cancel"
                                    class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Login forgot password form-->
            </div>
        </div>
    </div>
</div>


<script>
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
    window.get_url = "{{url('')}}";
    window.locales = {!! $locales !!};
    window.url_previous = "{{url()->previous()}}";

</script>

<script src="{{ asset('js/app.js') }}"></script>


<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<script src="{{url('')}}/admin_assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
<script src="{{url('')}}/admin_assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
<script src="{{url('')}}/admin_assets/js/scripts.bundle.js?v=7.0.5"></script>


<script src="{{url('')}}/admin_assets/custom/js/api.js"></script>
<script src="{{url('')}}/admin_assets/custom/js/general.js"></script>

<script src="{{url('')}}/admin_assets/custom/js/auth/login.js"></script>

</body>
</html>