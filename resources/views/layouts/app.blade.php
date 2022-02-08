<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('meta-csrf')
    {{-- App favicon --}}
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> --}}

    {{-- third party css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}"  type="text/css" />

    {{-- Material Design Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.4.95/css/materialdesignicons.min.css" />

    {{-- CSS Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    {{-- CSS Bootstrap --}}
    <link  rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css" id="light-style" />
    {{-- <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" /> --}}
    
    {{-- CSS ijaboCropTool --}}
    <link  rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}" type="text/css" id="light-style" />

    {{-- CSS Custom --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

</head>
<body>
    {{-- Navbar Start --}}
    @include('partials.user-navbar')
    {{-- Navbar End --}}

    {{-- CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    @include('partials.user-footer')

    {{-- JAVASCRIPT HYPER --}}
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    
    {{-- JQUERY --}}
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    
    <!-- JAVASCRIPT BOOTSTRAP -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

    {{-- JAVASCRIPT IJABO CROPT TOOL--}}
    <script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

    {{-- JAVASCRIPT CUSTOM --}}
    @yield('javascript')

</body>
</html>
