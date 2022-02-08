@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Dashboard | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- Page Title End -->

<!-- Row Content Start -->
<div class="row">
    <div class="col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="mdi mdi-database-check text-primary" style="font-size: 24px"></i>
                <h3><span>{{ $pengaduan }}</span></h3>
                <p class="text-muted font-15 mb-0">Total Pengaduan</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="mdi mdi-clipboard-alert-outline text-danger" style="font-size: 24px"></i>
                <h3><span>{{ $pending }}</span></h3>
                <p class="text-muted font-15 mb-0">Menunggu Konfirmasi</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="mdi mdi-progress-check text-warning" style="font-size: 24px"></i>
                <h3><span>{{ $proses }}</span></h3>
                <p class="text-muted font-15 mb-0">Sedang di Proses</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="mdi mdi-check-decagram text-success" style="font-size: 24px"></i>
                <h3><span>{{ $selesai }}</span></h3>
                <p class="text-muted font-15 mb-0">Selesai</p>
            </div>
        </div>
    </div>
</div>
<!-- Row Content End -->

<div class="row">
    <div class="col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-body text-center">
                <i class="mdi mdi-account-group text-primary" style="font-size: 24px"></i>
                <h3><span>{{ $user }}</span></h3>
                <p class="text-muted font-15 mb-0">Total Pengadu</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-body text-center">
                <i class="mdi mdi-domain text-success" style="font-size: 24px"></i>
                {{-- <i class='bx bx-buildings'></i> --}}
                <h3><span>{{ $perusahaan }}</span></h3>
                <p class="text-muted font-15 mb-0">Total Perusahaan</p>
            </div>
        </div>
    </div>
</div>
@endsection
