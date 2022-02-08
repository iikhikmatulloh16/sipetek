@extends('layouts.app')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Data Pengaduan | SI Pengaduan Tenaga Kerja')

@section('content')
    <!-- Hero Start -->
    <section class="hero-section">
        <div class="container">
            {{--  --}}
        </div>
    </section>
    <!-- Hero End -->

    <!-- Page Section Start -->
    <section class="py-5">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Card Start-->
                    <div class="card">
                        <!-- Card Body Start-->
                        <div class="card-body">
                            <h4 class="header-title">Data Pengaduan</h4>
                            <p class="text-muted font-14">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                            <a href="pengaduans/create" class="btn btn-success mb-3"><i class="mdi mdi-plus"></i> Tambah Pengaduan</a>
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
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
                                                <th>Subjek</th>
                                                <th>Perihal</th>
                                                <th>Tanggal Pengaduan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengaduans as $pengaduan) 
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-capitalize">{{ $pengaduan->subjek }}</td>
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
                                                <td>
                                                    <a href="pengaduans/{{ $pengaduan->slug }}" class="badge bg-info"><i class="mdi mdi-eye"></i></a>
                                                    {{-- <a href="pengaduans/{{ $pengaduan->slug }}/edit" class="badge bg-warning"><i class="mdi mdi-pencil"></i></a> --}}
                                                    @if ($pengaduan->status == 'Pending')
                                                    <a href="pengaduans/{{ $pengaduan->slug }}/edit" class="badge bg-warning"><i class="mdi mdi-pencil"></i></a>
                                                    <form action="pengaduans/{{ $pengaduan->slug }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="mdi mdi-close"></i></button>
                                                    </form>
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
    </section>
    <!-- Page Section End -->
@endsection