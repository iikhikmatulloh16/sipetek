@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Perihal | SI Pengaduan Tenaga Kerja')

@section('content')
{{-- Page Title Start --}}
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Data Perihal Pengaduan</h4>
        </div>
    </div>
</div>
{{-- Page Title Start End --}}

{{-- Row Start --}}
<div class="row">
    <div class="col-md-12">
        {{-- Card Start --}}
        <div class="card">
            {{-- Card Body Start --}}
            <div class="card-body">
                <h4 class="header-title">Tabel Data Perihal Pengaduan</h4>
                <p class="text-muted font-14">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                <a href="admin/perihals/create" class="btn btn-danger mb-3"><i class="mdi mdi-plus"></i> Tambah Perihal</a>
                <a href="{{ route('perihalExportExcel') }}" class="btn btn-success mb-3"><i class='bx bx-export' ></i> Export</a>
                <a type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-import' ></i> Import</a>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button> --}}
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- Tab Content Start --}}
                <div class="tab-content">
                    {{-- Table Responsive Start --}}
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Perihal Pengaduan</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perihals as $perihal) 
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-capitalize">{{ $perihal->name }}</td>
                                    <td>{{ $perihal->slug }}</td>
                                    <td>
                                        <a href="admin/perihals/{{ $perihal->slug }}/edit" class="badge bg-warning"><i class="mdi mdi-pencil"></i></a>
                                        <form action="admin/perihals/{{ $perihal->slug }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class='mdi mdi-delete'></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Table Responsive End --}}
                </div>
                {{-- Tab Content End --}}
                
                {{-- Modal Start --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="perihalsimportexcel" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="file" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success"><i class='bx bx-import' ></i> Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal End --}}
            </div>
            {{-- Card Body End --}}
        </div>
        {{-- Card End --}}
    </div>
</div>
{{-- Row End --}}
@endsection