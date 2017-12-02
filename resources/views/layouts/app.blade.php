<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/font.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/icon.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/landing.css')}}" type="text/css"/>

    <!--[if lt IE 9]>
    <script src="{{asset('js/ie/html5shiv.js')}}"></script>
    <script src="{{asset('js/ie/respond.min.js')}}"></script>
    <script src="{{asset('js/ie/excanvas.js')}}"></script>
    <![endif]-->
    <script type="text/javascript">
        window.ntimyeboah = window.ntimyeboah || {}
    </script>
</head>
<body>
    <!-- Include the main page content -->
    @yield('content_wrapper')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- App -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/app.plugin.js')}}"></script>
    <script src="{{asset('js/landing.js')}}"></script>
    <!-- Include any additional scripts specific to the page being viewed -->
    @yield('extra_scripts')
    @stack('additional_scripts')
</body>
</html>
