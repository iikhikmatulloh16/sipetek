@extends('auth.layouts.app')
@section('title', 'Sign In | SI Pengaduan Tenaga Kerja')

@section('content')

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo Start -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="{{ \URL::to('/') }}">
                            <span><img src="{{ asset('img/logo-white-1.svg') }}" alt="" height="18" /></span>
                        </a>
                    </div>
                    <!-- Logo End -->
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to make a complaint.</p>
                        </div>
                        @if(session()->has('registerSuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('registerSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your password?</small></a>
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 mb-3">
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked />
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                        
                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">
                        Don't have an account? <a href="{{ route('register') }}" class="text-muted ms-1"><b>Sign Up</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection