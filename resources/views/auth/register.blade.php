@extends('auth.layouts.app')
@section('title', 'Sign Up | SI Pengaduan Tenaga Kerja')

@section('content')
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    {{-- Logo Start --}}
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="{{ \URL::to('/') }}">
                        <span><img src="{{ asset('img/logo-white-1.svg') }}" alt="" height="18" /></span>
                        </a>
                    </div>
                    {{-- Logo End --}}

                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Free Sign Up</h4>
                            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute.</p>
                        </div>
                        @if(session()->has('registerError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('registerError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="Enter nomor induk kependudukan" value="{{ old('nik') }}" required autofocus>
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required aria-describedby="passwordHelp" />
                                <div class="form-text" id="passwordHelp">Password must be 8-16 characters long</div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm your password" required aria-describedby="passwordHelp" />
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signup" checked/>
                                <label class="form-check-label fw-normal" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">
                        Already have account? <a href="{{ route('login') }}" class="text-muted ms-1"><b>Log In</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection