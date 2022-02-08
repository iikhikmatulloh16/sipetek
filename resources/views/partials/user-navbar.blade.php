    <nav class="navbar navbar-expand-lg navbar-dark py-lg-3">
        <div class="container">
            <!-- Navbar Logo Start-->
            <a class="navbar-brand me-lg-5" href="{{ \URL::to('/') }}"> <img src="{{ asset('img/logo-white-1.svg') }}" alt="logo sipetek" height="18" /> </a>
            <!-- Navbar Logo End -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Left Menu Start-->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-lg-1"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item mx-lg-1"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item mx-lg-1"><a class="nav-link" href="#">Procedure</a></li>
                    <li class="nav-item mx-lg-1"><a class="nav-link" href="#">FAQs</a></li>
                    <li class="nav-item mx-lg-1"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <!-- Left Menu End -->

                <!-- Right Menu Start -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-capitalize active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Halo, {{ Auth::user()->name }} <i class="mdi mdi-heart text-danger ms-1"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    @if (Auth::user()->role == 1)
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="mdi mdi-home-variant-outline me-1"></i> My Dashboard</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="mdi mdi-account-circle me-1"></i> My Account</a>
                                    @endif
                                </li>
                                <li><hr class="dropdown-divider" /></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="mdi mdi-logout me-1"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item me-0">
                            <a href="{{ route('login') }}" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex"> <i class="mdi mdi-login me-2"></i> Sign In </a>
                        </li>
                    @endauth
                </ul>
                <!-- Right Menu End -->
            </div>
        </div>
    </nav>