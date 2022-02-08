@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Laporan Pengaduan | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Laporan Pengaduan</h4>
        </div>
    </div>
</div>
<!-- Page Title End -->

<!-- Row Content Start -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <!-- Row Start -->
        <div class="row">
            <div class="col-md-12">
                <!-- Card Start-->
                <div class="card">
                    <!-- Card Body Start-->
                    <div class="card-body">
                        <h4 class="header-title">Tabel Laporan Pengaduan</h4>
                        <p class="text-muted font-14">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                        {{-- <a href="admin/pengaduans/create" class="btn btn-success mb-3"><i class="bx bxs-plus-circle"></i> Tambah Pengaduan</a> --}}
                        {{-- <div class="mb-3">
                            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                        </div> --}}

                        <a href="{{ route('laporanExportPdf') }}" class="btn btn-danger mb-3"><i class='bx bx-export' ></i> Export</a>

                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- Tab Content Start-->
                        <div class="tab-content">
                            <!-- Table Responsive Start -->
                            <div class="table-responsive-sm">
                                <table class="table table-centered mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Pengadu</th>
                                            <th>Perusahaan Terkait</th>
                                            <th>Perihal Pengaduan</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengaduans as $index => $pengaduan) 
                                        <tr>
                                            <td>{{ $index + $pengaduans->firstItem() }}</td>
                                            <td>{{ $pengaduan->author->name }}</td>
                                            <td>{{ $pengaduan->perusahaan->name }}</td>
                                            <td>{{ $pengaduan->perihal->name }}</td>
                                            <td>{{ $pengaduan->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if($pengaduan->status == 'Pending')
                                                    <i class="bx bxs-circle text-danger"></i> {{ $pengaduan->status }}
                                                @elseif ($pengaduan->status == 'Proses')
                                                    <i class="bx bxs-circle text-warning"></i> {{ $pengaduan->status }}
                                                @else
                                                    <i class="bx bxs-circle text-success"></i> {{ $pengaduan->status }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Table Responsive End -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- Card Body End -->
                </div>
                <!-- Card End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
<!-- Row Content End -->

<div class="row">
    <div class="col-md-12">
        <div class="float-end">
            {{ $pengaduans->links() }}
        </div>
    </div>
</div>
@endsection
