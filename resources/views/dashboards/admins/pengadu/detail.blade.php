@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Profile Pengadu | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <a href="admin/pengadu" class="btn btn-primary ms-1"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
            </div>
            <h4 class="page-title">Profile Pengadu</h4>
        </div>
    </div>
</div>
<!-- Page Title End -->

<!-- Row Content Start -->
<div class="row">
    <div class="col-xl-4 col-lg-5">
        <!-- Card Start -->
        <div class="card text-center">
            <!-- Card Body Start -->
            <div class="card-body">
                <img src="{{ $user->picture }}" class="rounded-circle avatar-lg img-thumbnail user_picture" alt="profile-image" />
                <h4 class="mb-0 mt-2 text-capitalize user_name">{{ $user->name }}</h4>
                <p class="text-muted font-14">User</p>
                <input type="file" name="user_image" id="user_image" style="opacity: 0; height: 1px; display: none">
                {{-- <a href="javascript:void(0)" class="btn btn-success btn-sm mb-2" id="change_picture_btn"><i class="mdi mdi-file-image-plus"></i> Change Picture</a> --}}
                
                <!-- Text Start -->
                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">About Me :</h4>
                    <p class="text-muted font-13 mb-3 user_bio">{{ $user->bio ?? '-' }}</p>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Nomor Induk Kependudukan</p>
                        <p class="font-13 mb-0 user_nik">{{ $user->nik ?? '-' }}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Tempat Lahir</p>
                        <p class="font-13 mb-0 text-capitalize user_tempat_lahir">{{ $user->tempat_lahir ?? '-' }}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Tanggal Lahir</p>
                        <p class="font-13 mb-0 text-capitalize user_tanggal_lahir">
                            @if ($user->tanggal_lahir == NULL)
                                {{ $user->tanggal_lahir  ?? '-'  }}
                            @else
                                {{ $user->tanggal_lahir->format('d M Y') }}                                    
                            @endif
                        </p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Jenis Kelamin</p>
                        <p class="font-13 mb-0 text-capitalize user_jenis_kelamin">{{ $user->jenis_kelamin  ?? '-'  }}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Status</p>
                        <p class="font-13 mb-0 text-capitalize user_status_perkawinan">{{ $user->status_perkawinan  ?? '-'  }}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Alamat</p>
                        <p class="font-13 mb-0 text-capitalize">-</p>
                    </div>

                    <div class="profile-deskripsi">
                        <p class="text-muted mb-0 font-12 text-uppercase">Kontak</p>
                        <p class="font-13 mb-0 user_phone">{{ $user->phone  ?? '-'  }}</p>
                        <p class="font-13 mb-0 user_email">{{ $user->email  ?? '-'  }}</p>
                    </div>
                </div>
                <!-- Text End -->
            </div>
            <!-- Card Body End -->
        </div>
        <!-- Card End -->
    </div>

    <div class="col-xl-8 col-lg-7">
        <!-- Card Start -->
        <div class="card">
            <!-- Card Body Start -->
            <div class="card-body">
                <!-- Tab Content Strat -->
                <div class="tab-content">
                    <form>
                        <!-- NIK & Nama -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="text" class="form-control" value="{{ $user->nik ?? '-' }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Sesuai KTP</label>
                                    <input type="text" class="form-control text-capitalize" value="{{ $user->name ?? '-' }}" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- End Nik & Nama -->

                        <!-- Tentang Kamu -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="bio" class="form-label">Tentang Kamu</label>
                                    <textarea class="form-control" disabled>{{ $user->bio ?? '-' }}</textarea>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- End Tentang Kamu -->

                        <!-- Tempat, Tanggal Lahir -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control text-capitalize" value="{{ $user->tempat_lahir ?? '-' }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 position-relative" id="datepicker2">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control text-capitalize"
                                    @if ($user->tanggal_lahir == NULL)
                                        value="{{ $user->tanggal_lahir ?? '-' }}"
                                    @else
                                        value="{{ $user->tanggal_lahir->format('d M Y') }}"
                                    @endif
                                    disabled>
                                </div>
                            </div>
                        </div>
                        <!-- End Tempat, Tanggal Lahir -->

                        <!-- Status Perkawinan & Jenis Kelamin -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                                    <input type="text" class="form-control text-capitalize" value="{{ $user->status_perkawinan ?? '-' }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control text-capitalize" value="{{ $user->jenis_kelamin ?? '-' }}" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- End Status Perkawinan & Jenis Kelamin -->

                        <!-- Nomor Hanphone & Email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Handphone</label>
                                    <input type="text" class="form-control" value="{{ $user->phone ?? '-' }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email ?? '-' }}" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- End Nomor Hanphone & Email -->

                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-map me-1"></i> Alamat Lengkap</h5>
                        <!-- Provinsi & Kota -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control text-capitalize" value="-" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control text-capitalize" value="-" disabled>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- End Provinsi & Kota -->

                        <!-- Kecamatan & Kelurahan -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control text-capitalize" value="-" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Kelurahan</label>
                                    <input type="text" class="form-control text-capitalize" value="-" disabled>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- End Kecamatan & Kelurahan -->

                        <!-- Kode Pos -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control text-capitalize" value="-" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- End Kode Pos -->

                        <!-- Alamat Sesuai KTP -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Alamat Sesuai KTP</label>
                                    <textarea class="form-control" id="userbio" rows="4" disabled placeholder="-"></textarea>
                                    <span class="form-text text-muted"><small>Example: Kp. Singkir Rt 03 Rw 01</small></span>
                                </div>
                            </div>
                        </div>
                        <!-- End Alamat Sesuai KTP -->

                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bx-world me-1"></i> Social</h5>
                        <!-- Fb & Tw -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-fb" class="form-label">Facebook</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxl-facebook-circle"></i></span>
                                        <input type="text" class="form-control text-capitalize" value="-" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Twitter</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxl-twitter"></i></span>
                                        <input type="text" class="form-control text-capitalize" value="-" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- End Fb & Tw -->

                        <!-- Ig & In -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-insta" class="form-label">Instagram</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxl-instagram-alt"></i></span>
                                        <input type="text" class="form-control text-capitalize" value="-" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-lin" class="form-label">Linkedin</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxl-linkedin-square"></i></span>
                                        <input type="text" class="form-control text-capitalize" value="-" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- End Ig & In -->

                        <!-- Sky & Git -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-0">
                                    <label for="social-sky" class="form-label">Skype</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxl-skype"></i></span>
                                        <input type="text" class="form-control text-capitalize" value="-" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-0">
                                    <label for="social-gh" class="form-label">Github</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxl-github"></i></span>
                                        <input type="text" class="form-control text-capitalize" value="-" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- End Sky & Git -->
                    </form>
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- Card Body End -->
        </div>
        <!-- Card End -->
    </div>
</div>
<!-- Row Content End -->
@endsection