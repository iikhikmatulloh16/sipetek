@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Tambah Kelurahan | SI Pengaduan Tenaga Kerja')

@section('content')
{{-- Page Title Start --}}
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <a href="admin/villages" class="btn btn-primary ms-1"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
            </div>
            <h4 class="page-title">Data Kelurahan</h4>
        </div>
    </div>
</div>
{{-- Page Title End --}}

{{-- Row Start --}}
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            {{-- Card Body Start --}}
            <div class="card-body">
                <h4 class="header-title">Form Tambah Kelurahan</h4>
                <p class="text-muted font-14 mb-3">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                <form action="admin/villages" method="POST" autocomplete="off">
                    @csrf          
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID Kelurahan</label>
                                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" placeholder="Masukkan id kelurahan" value="{{ old('id') }}" required autofocus>
                                @error('id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="district_id" class="form-label">Pilih Kecamatan</label>
                                <select class="form-select" name="district_id">
                                    @foreach ($districts as $district)
                                        @if (old('district_id') == $district->id)
                                            <option value="{{ $district->id }}" selected>{{ $district->name }}</option>
                                        @else
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kelurahan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan nama kelurahan" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" style="opacity: 0; height: 1px; display: none" placeholder="Masukkan slug" value="{{ old('slug') }}" required/>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="text-end">
                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-view-grid-plus me-1"></i> Tambah Kelurahan</button>
                    </div>
                </form>
            </div>
            {{-- Card Body End --}}
        </div>
    </div>
</div>
{{-- Row End --}}
@endsection

@section('javascript')
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('admin/villages/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection