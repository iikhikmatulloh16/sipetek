@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Edit Perusahaan | SI Pengaduan Tenaga Kerja')

@section('content')
{{-- Page Title Start --}}
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <a href="admin/perusahaans" class="btn btn-primary ms-1"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
            </div>
            <h4 class="page-title">Data Perusahaan</h4>
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
                <form action="admin/perusahaans/{{ $perusahaan->slug }}" method="POST" autocomplete="off">
                    @method('put')
                    @csrf
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-map me-1"></i> Info Perusahaan</h5>
                    {{-- Nama & Tanggal Berdiri --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan nama perusahaan" value="{{ old('name', $perusahaan->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 position-relative" id="datepicker2">
                                <label for="tanggal_berdiri" class="form-label">Tanggal Berdiri</label>
                                <input type="text" class="form-control" name="tanggal_berdiri" id="tanggal_berdiri" data-provide="datepicker" data-date-format="d M yyyy" data-date-container="#datepicker2" 
                                {{-- @if ($perusahaan->tanggal_berdiri == NULL) --}}
                                    {{-- value="{{ $perusahaan->tanggal_berdiri }}" --}}
                                {{-- @else --}}
                                    value="{{ $perusahaan->tanggal_berdiri }}"
                                {{-- @endif --}}
                                placeholder="Masukkan tanggal berdiri" required>
                            </div>
                        </div>
                    </div>
                    {{-- Nama & Tanggal Berdiri End --}}

                    {{-- Slug --}}
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" style="opacity: 0; height: 1px; display: none" placeholder="Masukkan slug" value="{{ old('slug', $perusahaan->slug) }}" required>
                    {{-- @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror --}}
                    {{-- Slug End --}}

                    {{-- Jumlah Cabang --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cabangdalam" class="form-label">Jumlah Cabang di Indonesia</label>
                                <input type="text" class="form-control @error('cabangdalam') is-invalid @enderror" name="cabangdalam" id="cabangdalam" placeholder="Masukkan nama perusahaan" value="{{ old('cabangdalam', $perusahaan->cabangdalam) }}" required>
                                @error('cabangdalam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cabangluar" class="form-label">Jumlah Cabang di Luar Negeri</label>
                                <input type="text" class="form-control @error('cabangluar') is-invalid @enderror" name="cabangluar" id="cabangluar" placeholder="Masukkan nama perusahaan" value="{{ old('cabangluar', $perusahaan->cabangluar) }}" required>
                                @error('cabangluar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Jumlah Cabang End --}}

                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-map me-1"></i> Alamat Lengkap</h5>
                    {{-- Provinsi dan Kabupaten --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="province" class="form-label">Pilih Provinsi</label>
                                <select class="form-select" name="province_id" id="select_province" required>
                                    @foreach ($provinces as $province)
                                        @if (old('province_id', $perusahaan->province_id) == $province->id)
                                            <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                                        @else
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="regency" class="form-label">Pilih Kabupaten</label>
                                <select class="form-select" name="regency_id" id="select_regency" required>
                                    @foreach ($regencies as $regency)
                                        @if (old('regency_id', $perusahaan->regency_id) == $regency->id)
                                            <option value="{{ $regency->id }}" selected>{{ $regency->name }}</option>
                                        @else
                                            <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Provinsi dan Kabupaten End --}}
         
                    {{-- Kecamatan & Kelurahan --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="district" class="form-label">Pilih Kecamatan</label>
                                <select class="form-select" name="district_id" id="select_district" required>
                                    @foreach ($districts as $district)
                                        @if (old('district_id', $perusahaan->district_id) == $district->id)
                                            <option value="{{ $district->id }}" selected>{{ $district->name }}</option>
                                        @else
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="village" class="form-label">Pilih Kelurahan</label>
                                <select class="form-select" name="village_id" id="select_village" required>
                                    @foreach ($villages as $village)
                                        @if (old('village_id', $perusahaan->village_id) == $village->id)
                                            <option value="{{ $village->id }}" selected>{{ $village->name }}</option>
                                        @else
                                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                                        @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Kecamatan & Kelurahan End --}}

                    {{-- Kode Pos --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="pos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control @error('pos') is-invalid @enderror" name="pos" id="pos" placeholder="Masukkan kode pos" value="{{ old('pos', $perusahaan->pos) }}" required>
                                @error('pos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Kode Pos End --}}

                    {{-- Alamat Perusahaan --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat Perusahaan</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="4" placeholder="Masukkan alamat perusahaan" required>{{ old('address', $perusahaan->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <span class="form-text text-muted"><small>Example: Subang, 16 Januari 1998</small></span>
                            </div>
                        </div>
                    </div>
                    {{-- Alamat Perusahaan End --}}

                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-map me-1"></i> Kontak</h5>
                    {{-- Telp Perusahaan & Email --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telp. Perusahaan</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Masukkan kode phone" value="{{ old('phone', $perusahaan->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Perusahaan</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan kode email" value="{{ old('email', $perusahaan->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Telp Perusahaan & Email End --}}

                    <div class="text-end">
                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save me-1"></i> Simpan Perubahan</button>
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
        fetch('admin/perusahaans/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    $(document).ready(function() {
        // set var id
        let provinceID = $('#select_province').val();
        let regencyID = $('#select_regency').val();
        let districtID = $('#select_district').val();

        //  select province:start
        $('#select_province').select2({
            allowClear: true,
            ajax: {
            url: "{{ route('provinceSelect') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                        text: item.name,
                        id: item.id
                        }
                    })
                };
            }
            }
        });
        //  select province:end

        //  select regency:start
        $('#select_regency').select2({
            allowClear: true,
            ajax: {
            url: "{{ route('regencySelect') }}?provinceID=" + provinceID,
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                        text: item.name,
                        id: item.id
                        }
                    })
                };
            }
            }
        });
        //  select regency:end

        //  select district:start
        $('#select_district').select2({
            allowClear: true,
            ajax: {
            url: "{{ route('districtSelect') }}?regencyID=" + regencyID,
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                        text: item.name,
                        id: item.id
                        }
                    })
                };
            }
            }
        });
        //  select district:end

        //  select village:start
        $('#select_village').select2({
            allowClear: true,
            ajax: {
            url: "{{ route('villageSelect') }}?districtID=" + districtID,
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                        text: item.name,
                        id: item.id
                        }
                    })
                };
            }
            }
        });
        //  select village:end

        //  Event on change select province:start
        $('#select_province').change(function() {
            //clear select
            $('#select_regency').empty();
            $("#select_district").empty();
            $("#select_village").empty();
            //set id
            provinceID = $(this).val();
            if (provinceID) {
            $('#select_regency').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('regencySelect') }}?provinceID=" + provinceID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                        };
                    }
                }
            });
            } else {
            $('#select_regency').empty();
            $("#select_district").empty();
            $("#select_village").empty();
            }
        });
        //  Event on change select province:end

        //  Event on change select regency:start
        $('#select_regency').change(function() {
            //clear select
            $("#select_district").empty();
            $("#select_village").empty();
            //set id
            regencyID = $(this).val();
            if (regencyID) {
            $('#select_district').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('districtSelect') }}?regencyID=" + regencyID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                        };
                    }
                }
            });
            } else {
            $("#select_district").empty();
            $("#select_village").empty();
            }
        });
        //  Event on change select regency:end

        //  Event on change select district:Start
        $('#select_district').change(function() {
            //clear select
            $("#select_village").empty();
            //set id
            districtID = $(this).val();
            if (districtID) {
            $('#select_village').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('villageSelect') }}?districtID=" + districtID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                        };
                    }
                }
            });
            }
        });
        //  Event on change select district:End

        // EVENT ON CLEAR
        $('#select_province').on('select2:clear', function(e) {
            $("#select_regency").select2();
            $("#select_district").select2();
            $("#select_village").select2();
        });

        $('#select_regency').on('select2:clear', function(e) {
            $("#select_district").select2();
            $("#select_village").select2();
        });

        $('#select_district').on('select2:clear', function(e) {
            $("#select_village").select2();
        });
    });   
</script>
@endsection