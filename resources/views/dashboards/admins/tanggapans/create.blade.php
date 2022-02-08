@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Tanggapi | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <a href="{{ url('admin/pengaduans') }}" class="btn btn-primary ms-1"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
            </div>
            <h4 class="page-title">Tanggapi</h4>
        </div>
    </div>
</div>
<!-- Page Title End -->

<!-- Row Start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <h4 class="header-title">Form Tanggapan</h4>
                    <p class="text-muted font-14 mb-3">Lorem, ipsum dolor sit amet <code>&lt;consectetur&gt;</code> adipisicing elit. Voluptate, accusamus!</p>
                    <form action="{{ route('tanggapans.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Tempat, Tanggal Lahir -->
                        <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }} ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="body" class="form-label">Isi Tanggapan</label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4" placeholder="Write something..." required>{{ old('body') }}</textarea>
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
                                    <label for="image" class="form-label">Bukti Tanggapan</label>
                                    <img class="col-sm-6 img-preview img-fluid mb-2 ">
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
                            <button type="submit" class="btn btn-success mt-2"><i class="bx bxs-send"></i> Kirim Tanggapan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Row End --}}
@endsection

@section('javascript')
<script>
    // Image Preview
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload =  function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection