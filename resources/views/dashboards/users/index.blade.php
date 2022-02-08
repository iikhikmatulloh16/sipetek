@extends('layouts.app')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Pengaduan | SI Pengaduan Tenaga Kerja')

@section('content')
    <!-- Hero Start -->
    <section class="hero-section">
        <div class="container">
            <!-- // -->
        </div>
    </section>
    <!-- Hero End -->

    <!-- Page Section Start -->
    <section class="py-5">
        <div class="container">
            User Dashboard
        </div>
    </section>
    <!-- Page Section End -->
@endsection