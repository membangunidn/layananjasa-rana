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
        <link rel="stylesheet" href="{{asset('front/front/css/core.css')}}">
        <link rel="stylesheet" href="{{asset('front/front/css/footer.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

        {{-- from assets --}}
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/custom/css/custom.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        @stack('css')

        <style>

        </style>
    </head>

    <body id="site_body" class="header-enabled">
        <main class="main" id="main">
            
            @include('app.header')
            
            @yield('content')

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-xs-12">
                            <div class="right-text-content">
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xs-12">
                            <div class="left-text-content">
                                <p>© Copyright © 2021 Membangun.id
                                
                                <br>Powered by Dev</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>

        <a href="#" 
            style="position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
          font-size:30px;
            box-shadow: 2px 2px 3px #999;
          z-index:100;" target="_blank">
            <i class="fa fa-whatsapp" style="margin-top:16px;"></i>
        </a>

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