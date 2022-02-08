@extends('layouts.app')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Perihal | SI Pengaduan Tenaga Kerja')

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
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Card Start-->
                    <div class="card">
                        <!-- Card Body Start-->
                        <div class="card-body">
                            <h4 class="header-title">Table head options</h4>
                            <p class="text-muted font-14">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                            <a href="{{ url('pengaduans/create') }}" class="btn btn-success mb-3"><i class="bx bxs-plus-circle"></i> Tambah Pengaduan</a>
                            <!-- Tab Content Start-->
                            <div class="tab-content">
                                <!-- Table Responsive Start -->
                                <div class="table-responsive-sm">
                                    <table class="table table-centered mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Subjek</th>
                                                <th>Isi Pengaduan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengaduans as $pengaduan) 
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $pengaduan->title }}</td>
                                                <td>{{ $pengaduan->body }}</td>
                                                <td><i class="bx bxs-circle text-success"></i> Selesai</td>
                                                <td>
                                                    <a href="pengaduans/{{ $pengaduan->slug }}" class="btn btn-info"><i class="mdi mdi-eye"></i></a>
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