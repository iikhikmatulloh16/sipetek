<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> -->

    <!-- third party css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}"  type="text/css" />

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.4.95/css/materialdesignicons.min.css" />

    <!-- CSS Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    <!-- CSS Bootstrap -->
    <link  rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css" id="light-style" />
    <!-- <link rel="stylesheet" href="css/css-custom/bootstrap.min.css" /> -->

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">
    
</head>
<body class="authentication-bg">
    <!-- Login Start -->
    @yield('content')
    <!-- Login End -->

    <!-- Footer Start -->
    <footer class="footer footer-alt py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-muted text-center mb-0">&copy; 2021 Copyright <b>Iik Hikmatulloh.</b> <i class="mdi mdi-heart text-danger"></i> All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
