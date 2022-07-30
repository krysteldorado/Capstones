<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BATIS</title>
        
        <link rel="apple-touch-icon" href="{{ asset('img/batis-logo.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/batis-logo.png') }}">
        <link rel="stylesheet" href="{{ asset('socialv/css/libs.min.css') }}">
        <link rel="stylesheet" href="{{ asset('socialv/css/socialv.css?v=4.0.0') }}">
        <link rel="stylesheet" href="{{ asset('socialv/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('socialv/vendor/remixicon/fonts/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('socialv/vendor/vanillajs-datepicker/dist/css/datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('socialv/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('socialv/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('c/b/custom.css') }}">

        
        @livewireStyles
    </head>
    <body class="">
        @yield('content')
    </body>
    
    @livewireScripts
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('socialv/js/libs.min.js') }}"></script>
    <!-- slider JavaScript -->
    <script src="{{ asset('socialv/js/slider.js') }}"></script>
    <!-- masonry JavaScript --> 
    <script src="{{ asset('socialv/js/masonry.pkgd.min.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('socialv/js/enchanter.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('socialv/js/sweetalert.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('socialv/js/customizer.js') }}"></script>
    <!-- app JavaScript -->
    <script src="{{ asset('socialv/js/charts/weather-chart.js') }}"></script>
    <script src="{{ asset('socialv/js/app.js') }}"></script>
    <script src="{{ asset('socialv/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('socialv/js/lottie.js') }}"></script>
</html>