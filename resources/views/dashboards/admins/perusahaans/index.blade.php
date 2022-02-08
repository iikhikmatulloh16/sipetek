@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Data Perusahaan | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form action="admin/perusahaans" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" placeholder="Search..." name="search" id="dash-daterange" value="{{ request('search') }}">
                        <button class="input-group-text btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <h4 class="page-title">Data Perusahaan</h4>
        </div>
    </div>
</div>
<!-- Page Title End -->



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Tabel Data Perusahaan</h4>
                <p class="text-muted font-14">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                <a href="{{ url('admin/perusahaans/create') }}" class="btn btn-danger mb-3"><i class="mdi mdi-plus"></i> Tambah Perusahaan</a>

                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Row Start --}}
                <div class="row">
                    @foreach ($perusahaans as $perusahaan)    
                    <div class="col-lg-4">
                        <!-- Card Start -->
                        <div class="card shadow-none border">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-md">
                                        <span class="avatar-title bg-light text-secondary rounded">
                                            <i class="mdi mdi-home-city-outline font-22"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col ps-0">
                                    <a href="admin/perusahaans/{{ $perusahaan->slug }}" class="text-muted fw-bold">{{ $perusahaan->name }}</a>
                                    <p class="mt-1 mb-0 text-muted">
                                        <span class="text-success"><i class="mdi mdi-map-marker"></i></span>
                                        <span class="text-nowrap">{{ $perusahaan->regency->name }}, {{ $perusahaan->province->name }}</span>
                                    </p>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- Card End -->
                    </div>
                    @endforeach
                </div>
                {{-- Row End --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="float-end">
            {{ $perusahaans->links() }}
        </div>
    </div>
</div>
@endsection
