<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-waste Management System') }}</title>

    <!--Favicon-->
    <link rel="icon" href="{{ asset('user-assets/img/favicon.png') }}" type="image/jpg">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('user-assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Line Awesome CSS -->
    <link href="{{ asset('user-assets/css/line-awesome.min.css') }}" rel="stylesheet">
    <!-- Animate CSS-->
    <link href="{{ asset('user-assets/css/animate.css') }}" rel="stylesheet">
    <!-- Bar Filler CSS -->
    <link href="{{ asset('user-assets/css/barfiller.css') }}" rel="stylesheet">
    <!-- Magnific Popup Video -->
    <link href="{{ asset('user-assets/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Flaticon CSS -->
    <link href="{{ asset('user-assets/css/flaticon.css') }}" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="{{ asset('user-assets/css/owl.carousel.css') }}" rel="stylesheet">
    <!-- Slick CSS -->
    <link href="{{ asset('user-assets/css/slick.css') }}" rel="stylesheet">
    <!-- Nice Select  -->
    <link href="{{ asset('user-assets/css/nice-select.css') }}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{ asset('user-assets/css/style.css') }}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ asset('user-assets/css/responsive.css') }}" rel="stylesheet">

    <!-- jquery -->
    <script src="{{ asset('user-assets/js/jquery-1.12.4.min.js') }}"></script>
</head>

<body class="font-sans text-gray-900 antialiased">
    @include('user-pages.header')

    @yield('content')

    @include('user-pages.footer')
    <!-- Scroll Top Area -->
    <a href="#top" class="go-top"><i class="las la-angle-up"></i></a>

    <!-- Popper JS -->
    <script src="{{ asset('user-assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('user-assets/js/bootstrap.min.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('user-assets/js/wow.min.js') }}"></script>
    <!-- Way Points JS -->
    <script src="{{ asset('user-assets/js/jquery.waypoints.min.js') }}"></script>
    <!-- Counter Up JS -->
    <script src="{{ asset('user-assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('user-assets/js/owl.carousel.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('user-assets/js/slick.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('user-assets/js/magnific-popup.min.js') }}"></script>
    <!-- Sticky JS -->
    <script src="{{ asset('user-assets/js/jquery.sticky.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('user-assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- Progress Bar JS -->
    <script src="{{ asset('user-assets/js/jquery.barfiller.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('user-assets/js/main.js') }}"></script>
</body>

</html>