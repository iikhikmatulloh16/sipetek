@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Data Pengadu | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form action="admin/pengadu" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" placeholder="Search..." name="search" id="dash-daterange" value="{{ request('search') }}">
                        <button class="input-group-text btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <h4 class="page-title">Data Pengadu</h4>
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
                        <h4 class="header-title">Tabel Data Pengadu</h4>
                        <p class="text-muted font-14">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                        {{-- <a href="admin/pengaduans/create" class="btn btn-success mb-3"><i class="bx bxs-plus-circle"></i> Tambah Pengaduan</a> --}}
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
                                            <th>Name</th>
                                            <th>NIK</th>
                                            <th>No Handphone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user) 
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-capitalize">{{ $user->name }}</td>
                                            <td>{{ $user->nik }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="admin/pengadu/{{ $user->id }}" class="badge bg-info"><i class="mdi mdi-eye"></i></a>
                                                {{-- <a href="" class="badge bg-warning"><i class="mdi mdi-pencil"></i></a> --}}
                                                <form action="admin/pengadu/{{ $user->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="mdi mdi-close"></i></button>
                                                </form>
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
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
