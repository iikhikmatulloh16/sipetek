@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Edit Pengaduan | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit Pengaduan</h4>
        </div>
    </div>
</div>
<!-- Page Title End -->

<!-- ROW -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <!-- Card Body -->
            <div class="card-body">
                <!-- Tab Content -->
                <div class="tab-content">
                    <form action="admin/pengaduans/{{ $pengaduan->slug }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-pencil me-1"></i> Edit Pengaduan</h5>
                        <!-- Perusahaan Terkait & Perihal -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="perusahaan_id" class="form-label">Perusahaan Terkait</label>
                                    <select class="form-select" name="perusahaan_id" id="perusahaan_id">
                                        @foreach ($perusahaans as $perusahaan)
                                            @if (old('perusahaan_id', $pengaduan->perusahaan_id) == $perusahaan->id)
                                                <option value="{{ $perusahaan->id }}" selected>{{ $perusahaan->name }}</option>
                                            @else
                                                <option value="{{ $perusahaan->id }}">{{ $perusahaan->name }}</option>
                                            @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="perihal" class="form-label">Perihal Pengaduan</label>
                                    <select class="form-select" name="perihal_id">
                                        @foreach ($perihals as $perihal)
                                            @if (old('perihal_id', $pengaduan->perihal_id) == $perihal->id)
                                                <option value="{{ $perihal->id }}" selected>{{ $perihal->name }}</option>
                                            @else
                                                <option value="{{ $perihal->id }}">{{ $perihal->name }}</option>
                                            @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Nik & Nama -->

                        <!-- Subjek -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="subjek" class="form-label">Subjek</label>
                                    <input type="text" class="form-control text-capitalize @error('subjek') is-invalid @enderror" name="subjek" id="subjek" placeholder="Masukkan subjek" value="{{ old('subjek', $pengaduan->subjek) }}" required autofocus/>
                                    @error('subjek')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Subjek -->
                        
                        {{-- Slug Start--}}
                        {{-- <div class="row"> --}}
                            {{-- <div class="col-12"> --}}
                                {{-- <div class="mb-3"> --}}
                                    {{-- <label for="slug" class="form-label">Slug</label> --}}
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" style="opacity: 0; height: 1px; display: none" placeholder="Masukkan slug" value="{{ old('slug', $pengaduan->slug) }}" required/>
                                    @error('slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- Slug End --}}

                        <!-- Tempat, Tanggal Lahir -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="body" class="form-label">Isi Pengaduan</label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4" placeholder="Write something...">{{ old('body', $pengaduan->body) }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- End Tempat, Tanggal Lahir -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Bukti Pengaduan</label>
                                    <input type="hidden" name="oldImage" value="{{ $pengaduan->image }}">
                                    @if ($pengaduan->image)
                                        <img src="{{ asset('storage/' . $pengaduan->image) }}" class="col-sm-6 img-preview img-fluid d-block mb-2">
                                    @else
                                        <img class="col-sm-6 img-preview img-fluid mb-2 ">
                                    @endif
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage()"/>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2"><i class="bx bxs-send"></i> Edit Pengaduan</button>
                        </div>
                    </form>
                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Card Body -->
        </div>
    </div>
</div>
<!-- END ROW -->

@endsection