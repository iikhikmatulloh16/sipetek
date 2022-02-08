{{-- @dd($pengaduans); --}}
@extends('layouts.app')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Detail Pengaduan | SI Pengaduan Tenaga Kerja')

@section('content')
    <!-- Hero Start -->
    <section class="hero-section">
        <div class="container">
            {{--  --}}
        </div>
    </section>
    <!-- Hero End -->

    <section class="py-5">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Card Start -->
                    <div class="card bg-primary">
                        <!-- Card Body Start -->
                        <div class="card-body profile-user-box">
                            <!-- Row Start -->
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-lg">
                                                <img src="{{ $pengaduan->author->picture }}" alt="" class="rounded-circle img-thumbnail" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <h4 class="mt-1 mb-1 text-white text-capitalize">{{ $pengaduan->author->name }}</h4>
                                                <p class="font-13 text-white-50">{{ $pengaduan->author->nik }}</p>

                                                <ul class="mb-0 list-inline text-light">
                                                    <li class="list-inline-item me-3">
                                                        <h5 class="mb-1">{{ $pengaduan->created_at->format('d M Y') }}</h5>
                                                        <p class="mb-0 font-13 text-white-50">Tanggal Pengaduan</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        @if ($pengaduan->status == 'Pending')
                                                            <h5 class="mb-1"><i class="bx bxs-circle text-danger"></i> {{ $pengaduan->status }}</h5>
                                                        @elseif ($pengaduan->status == 'Proses')
                                                            <h5 class="mb-1"><i class="bx bxs-circle text-warning"></i> {{ $pengaduan->status }}</h5>
                                                        @else
                                                            <h5 class="mb-1"><i class="bx bxs-circle text-success"></i> {{ $pengaduan->status }}</h5>
                                                        @endif

                                                        {{-- @if($pengaduan->status == 'Pending')
                                                            <i class="bx bxs-circle text-primary"></i> {{ $pengaduan->status }}
                                                        @elseif ($pengaduan->status == 'Proses')
                                                            <i class="bx bxs-circle text-warning"></i> {{ $pengaduan->status }}
                                                        @else
                                                            <i class="bx bxs-circle text-Success"></i> {{ $pengaduan->status }}
                                                        @endif --}}
                                                        <p class="mb-0 font-13 text-white-50">Status Pengaduan</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                        <a href="{{ url('pengaduans') }}" type="button" class="btn btn-light"><i class="mdi mdi-arrow-left"></i> Back</a>
                                        {{-- <a href="pengaduans/{{ $pengaduan->slug }}/edit" type="button" class="btn btn-light"><i class="mdi mdi-pencil me-1"></i> Edit Pengaduan</a> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Card Body End -->
                    </div>
                    <!-- Card End -->
                </div>
            </div>
            <!-- Row End -->

            <!-- Row Start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Card Start -->
                    <div class="card">
                        <!-- Card Body Start -->
                        <div class="card-body">
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                <li class="nav-item"><a href="#deskripsi" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active"> Deskripsi </a></li>
                                <li class="nav-item"><a href="#tanggapan" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0"> Tanggapan </a></li>
                            </ul>
                            <!-- Tab Content Start-->
                            <div class="tab-content">
                                <!-- About Me Start -->
                                <div class="tab-pane active" id="deskripsi">
                                    <h5 class="mb-4 text-uppercase"><i class="bx bxs-plane-alt me-1"></i> Informasi Pengaduan</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-semibold mb-0-5">Perusahaan Terkait</p>
                                            <p class="text-muted"><a href="/perusahaans/{{ $pengaduan->perusahaan->slug }}">{{ $pengaduan->perusahaan->name }}</a></p>
                                            {{-- <p class="text-muted">{{ $pengaduan->perusahaan->name }}</p> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fw-semibold mb-0-5">Perihal Pengaduan</p>
                                            <p class="text-muted"><a href="/perihals/{{ $pengaduan->perihal->slug }}">{{ $pengaduan->perihal->name }}</a></p>
                                            {{-- <p class="text-muted">{{ $pengaduan->perihal->name }}</p> --}}
                                        </div>
                                    </div>

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-note me-1"></i> Subjek</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-muted text-capitalize">{{ $pengaduan->subjek }}</p>
                                        </div>
                                    </div>

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-folder-open me-1"></i> Isi Pengaduan</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-muted">
                                                {{ $pengaduan->body }}
                                            </p>
                                        </div>
                                    </div>

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-camera me-1"></i> Bukti Pengaduan</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            @if ($pengaduan->image)
                                                <img src="{{ asset('storage/' . $pengaduan->image) }}" alt="" class="img-thumbnail" width="100%" />
                                            @else
                                                <img src="{{ asset('storage/pengaduan-images/' . 'no-image.svg') }}" alt="" class="img-thumbnail" width="100%" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- About Me End -->

                                <!-- Tanggapan Start-->
                                <div class="tab-pane" id="tanggapan">
                                    <h5 class="mb-4 text-uppercase"><i class="bx bxs-plane-alt me-1"></i> Informasi Tanggapan</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-semibold mb-0-5">Tanggal Tanggapan</p>
                                            <p class="text-muted">
                                                @if (empty($pengaduan->tanggapan->created_at))
                                                    
                                                @else
                                                    {{ $pengaduan->tanggapan->created_at->format('d M Y') }}
                                                @endif
                                            </p>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <p class="fw-semibold mb-0-5">Petugas</p>
                                            <p class="text-muted">{{ $pengaduan->tanggapan->user_id }}</p>
                                        </div> --}}
                                    </div>

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-folder-open me-1"></i> Isi Tanggapan</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-muted">
                                                {{ $pengaduan->tanggapan->body ?? '-' }}
                                            </p>
                                        </div>
                                    </div>

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-camera me-1"></i> Bukti Tanggapan</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            @if (empty($pengaduan->tanggapan->image))
                                                <img src="{{ asset('storage/tanggapan-images/' . 'no-image.svg') }}" alt="" class="img-thumbnail" width="100%" />
                                            @else
                                                <img src="{{ asset('storage/' . $pengaduan->tanggapan->image) }}" alt="" class="img-thumbnail" width="100%" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Tanggapan End -->
                            </div>
                            <!-- Tab Content End -->
                        </div>
                        <!-- Card Body End -->
                    </div>
                    <!-- Card Start -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </section>
@endsection