@extends('auth.layouts.app')
@section('title', 'Forgot Password | SI Pengaduan Tenaga Kerja')

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
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Forgot Password</h4>
                            <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @else
                            
                        @endif
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email" required/>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">Send Password Link</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Back to <a href="{{ route('login') }}" class="text-muted ms-1"><b>Log In</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection