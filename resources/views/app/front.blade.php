<html lang="en">
    <head>
        <title>Membangun.id</title>
        <link rel="shortcut icon" href="{{asset('front/front/img/tukang.png')}}">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="_token" content="{{csrf_token()}}">
        <meta name="url" content="{{url('').'/'}}">

        <link rel="stylesheet" href="{{asset('front/front/css/main.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

        {{-- from assets --}}
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		{{-- <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{asset('assets/custom/css/custom.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

        @stack('css')
    </head>

    <body id="site_body" class="header-enabled">
        <main class="main" id="main">
            
            @include('app.header')
            
            @yield('content')
        
            <footer class="footer mt-10 py-5">
                <div class="border-top"></div>

                <div class="container pt-6 pb-2">
                    <div class="d-flex align-items-center justify-content-between flex-lg-row flex-column">
                        <div class="d-flex align-items-center order-lg-1 order-2">
                            <a class="d-none d-md-flex align-items-center">
                                <img alt="logo" src="{{asset('front/front/img/logotukang.png')}}" class="h-60px h-md-60px">
                            </a>
            
                            <div class="d-flex flex-wrap align-items-center mt-1 ml-5 ml-lg-20 font-weight-bold">
                                <a href="https://keenthemes.com/faqs" class="mr-3 mr-lg-5">
                                    FAQs
                                </a>
                                <a href="https://keenthemes.com/licenses" class="mr-3 mr-lg-5">
                                    Licenses
                                </a>
                                <a href="https://keenthemes.com/faqs#support" class="mr-3 mr-lg-5">
                                    Support
                                </a>
                                <a href="https://keenthemes.com/terms" class="mr-3 mr-lg-5">
                                    Terms
                                </a>
                                <a href="https://keenthemes.com/privacy" class="mr-3 mr-lg-5">
                                    Privacy
                                </a>
                                <a href="https://keenthemes.com/refund-policy" class="mr-0 mr-lg-5">
                                    Refund
                                </a>
                            </div>
                        </div>
                        
                        <nav class="nav footer-nav d-flex align-items-center order-lg-2 order-1 mb-lg-0 mb-5">
                            Copyright © 2021 Membangun.id
                        </nav>
                    </div>
                </div>
            </footer>      
        </main>

        <script src="{{asset('front/front/js/main.bundle.js')}}"></script>

        {{-- js from assets --}}
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
        <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <script src="{{asset('assets/custom/js/main.js')}}"></script>

        @stack('js')
    </body>
</html>