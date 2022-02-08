<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
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
    {{-- CSS ijaboCropTool --}}
    <link  rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}" type="text/css" id="light-style" />
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">
</head>

{{-- <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'> --}}
<body class="loading" data-layout-config='{"leftSideBarTheme":"dark"}'>
    {{-- Wrapper Start --}}
    <div class="wrapper">
         {{-- ========== Left Sidebar Start ==========  --}}
        @include('dashboards.admins.partials.admin-left-sidebar')
        
        {{-- ========== Left Sidebar End ========== --}}

        {{-- ========== Content Page Start ========== --}}
        <div class="content-page">
            {{-- Content Start --}}
            <div class="content">
                {{-- Topbar Start --}}
                @include('dashboards.admins.partials.admin-topbar')
                {{-- Topbar End --}}

                {{-- Container Fluid Start --}}
                <div class="container-fluid">
                    @yield('content')
                </div>
                {{-- Container Fluid End --}}
            </div>
            {{-- Content End --}}

            {{-- Footer Start --}}
            @include('dashboards.admins.partials.admin-footer')
            {{-- Footer End --}}
        </div>
        {{-- ========== Content Page End ========== --}}
    </div>
    {{-- wrapper End --}}

    {{-- JavaScript Hyper --}}
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    {{-- JavaScript Ijabo Crop Tool--}}
    <script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    {{-- JavaScript Custom --}}
    @yield('javascript')
    {{-- @stack('javascript-internal') --}}
</body>
</html>
