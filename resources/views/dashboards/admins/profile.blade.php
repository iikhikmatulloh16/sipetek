@extends('dashboards.admins.layouts.admin-dash-layout')
@section('meta-csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Profile | SI Pengaduan Tenaga Kerja')

@section('content')
<!-- Page Title Start -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">My Profile</h4>
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
                <img src="{{ Auth::user()->picture }}" class="rounded-circle avatar-lg img-thumbnail user_picture" alt="profile-image" />
                <h4 class="mb-0 mt-2 text-capitalize user_name">{{ Auth::user()->name }}</h4>
                <p class="text-muted font-14">User</p>
                <input type="file" name="user_image" id="user_image" style="opacity: 0; height: 1px; display: none">
                <a href="javascript:void(0)" class="btn btn-success btn-sm mb-2" id="change_picture_btn"><i class="mdi mdi-file-image-plus"></i> Change Picture</a>
                
                <!-- Text Start -->
                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">About Me :</h4>
                    <p class="text-muted font-13 mb-3 user_bio">{{ Auth::user()->bio }}</p>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Nomor Induk Kependudukan</p>
                        <p class="font-13 mb-0 user_nik">{{ Auth::user()->nik }}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Tempat Lahir</p>
                        <p class="font-13 mb-0 text-capitalize user_tempat_lahir">{{ Auth::user()->tempat_lahir}}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Tanggal Lahir</p>
                        <p class="font-13 mb-0 text-capitalize user_tanggal_lahir">
                            @if (Auth::user()->tanggal_lahir == NULL)
                                {{ Auth::user()->tanggal_lahir }}
                            @else
                                {{ Auth::user()->tanggal_lahir->format('d M Y') }}                                    
                            @endif
                        </p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Jenis Kelamin</p>
                        <p class="font-13 mb-0 text-capitalize user_jenis_kelamin">{{ Auth::user()->jenis_kelamin }}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Status</p>
                        <p class="font-13 mb-0 text-capitalize user_status_perkawinan">{{ Auth::user()->status_perkawinan }}</p>
                    </div>

                    <div class="profile-deskripsi mb-3">
                        <p class="text-muted mb-0 font-12 text-uppercase">Alamat</p>
                        <p class="font-13 mb-0 text-capitalize">-</p>
                    </div>

                    <div class="profile-deskripsi">
                        <p class="text-muted mb-0 font-12 text-uppercase">Kontak</p>
                        <p class="font-13 mb-0 user_phone">{{ Auth::user()->phone }}</p>
                        <p class="font-13 mb-0 user_email">{{ Auth::user()->email }}</p>
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
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item"><a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active"> About </a></li>
                    <li class="nav-item"><a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0"> Settings </a></li>
                </ul>
                <!-- Tab Content Strat -->
                <div class="tab-content">
                    <!-- About Me -->
                    <div class="tab-pane active" id="aboutme">
                        <form action="{{ route('adminUpdateInfo') }}" method="POST" id="AdminInfoForm" autocomplete="off">
                            <h5 class="mb-4 text-uppercase"><i class="bx bxs-user-circle me-1"></i> PERSONAL INFO</h5>
                            <!-- NIK & Nama -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                        <input type="text" class="form-control" name="nik" id="nik" value="{{ Auth::user()->nik }}" placeholder="Masukkan nomor induk kependudukan" required autofocus readonly/>
                                        <span class="form-text text-danger error-text small nik_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Sesuai KTP</label>
                                        <input type="text" class="form-control text-capitalize" name="name" id="name" value="{{ Auth::user()->name }}" placeholder="Masukkan nama kamu" required/>
                                        <span class="form-text text-danger error-text small name_error"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Nik & Nama -->

                            <!-- Tentang Kamu -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Tentang Kamu</label>
                                        <textarea class="form-control" name="bio" id="bio" rows="4" placeholder="Write something..." required>{{ Auth::user()->bio }}</textarea>
                                        {{-- <input type="text" class="form-control" name="bio" id="bio" value="{{ Auth::user()->bio }}" placeholder="Write something..." required/> --}}
                                        <span class="form-text text-danger error-text small bio_error"></span>
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
                                        <input type="text" class="form-control text-capitalize" name="tempat_lahir" id="tempat_lahir" value="{{ Auth::user()->tempat_lahir }}" placeholder="Masukkan tempat lahir" required/>
                                        <span class="form-text text-danger error-text small tempat_lahir_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 position-relative" id="datepicker2">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" data-provide="datepicker" data-date-format="d M yyyy" data-date-container="#datepicker2" 
                                        @if (Auth::user()->tanggal_lahir == NULL)
                                            value="{{ Auth::user()->tanggal_lahir }}"
                                        @else
                                            value="{{ Auth::user()->tanggal_lahir->format('d M Y') }}"
                                        @endif
                                        placeholder="Masukkan tempat, tanggal lahir" required/>
                                        <span class="form-text text-danger error-text small tanggal_lahir_error"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tempat, Tanggal Lahir -->

                            <!-- Status Perkawinan & Jenis Kelamin -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                                        <select class="form-select" name="status_perkawinan" id="status_perkawinan" required>
                                            <option value="{{ Auth::user()->status_perkawinan }}">{{ Auth::user()->status_perkawinan }}</option>
                                            <optgroup label="Pilih Status Perkawinan">
                                            <option value="Lajang / Belum Menikah">Belum Menikah</option>
                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                            <option value="Duda">Duda</option>
                                            <option value="Janda">Janda</option>
                                        </select>
                                        <span class="form-text text-danger error-text small status_perkawinan_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                            <option value="{{ Auth::user()->jenis_kelamin }}">{{ Auth::user()->jenis_kelamin }}</option>
                                            <optgroup label="Pilih Jenis Kelamin">
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <div class="mt-1">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Laki - Laki" {{ Auth::user()->jenis_kelamin == 'Laki - Laki'? 'checked' : '' }} >
                                                <label class="form-check-label" for="jenis_kelamin">Laki - Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" {{ Auth::user()->jenis_kelamin == 'Perempuan'? 'checked' : '' }} >
                                                <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                            </div>
                                        </div>
                                        <span class="form-text text-danger error-text small jenis_kelamin_error"></span>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- End Status Perkawinan & Jenis Kelamin -->

                            <!-- Nomor Hanphone & Email -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Nomor Handphone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}" placeholder="Masukkan nomor handphone" required/>
                                        <span class="form-text text-danger error-text small phone_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Alamat Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Masukkan alamat email" required/>
                                        <span class="form-text text-danger error-text small email_error"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Nomor Hanphone & Email -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bxs-map me-1"></i> Alamat Lengkap</h5>
                            <!-- Provinsi & Kota -->
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Provinsi</label>
                                        <select class="form-select" id="example-select">
                                            <option>Bali</option>
                                            <option>Bangka Belitung</option>
                                            <option>Banten</option>
                                            <option>Bengkulu</option>
                                            <option>DI Yogyakarta</option>
                                            <option>KDI Jakarta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Kota</label>
                                        <select class="form-select" id="example-select">
                                            <option>Bandung</option>
                                            <option>Banjar</option>
                                            <option>Bekasi</option>
                                            <option>Bogor</option>
                                            <option>Cimahi</option>
                                            <option>Cirebon</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div> --}}
                            <!-- End Provinsi & Kota -->

                            <!-- Kecamatan & Kelurahan -->
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Kecamatan</label>
                                        <select class="form-select" id="example-select">
                                            <option>Binong</option>
                                            <option>Blanakan</option>
                                            <option>Ciasem</option>
                                            <option>Ciater</option>
                                            <option>Cibogo</option>
                                            <option>Cijambe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Kelurahan</label>
                                        <select class="form-select" id="example-select">
                                            <option>Buniara</option>
                                            <option>Cibuluh</option>
                                            <option>Cikawung</option>
                                            <option>Cimeuhmah</option>
                                            <option>Gandasoli</option>
                                            <option>Kawungluwuk</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div> --}}
                            <!-- End Kecamatan & Kelurahan -->

                            <!-- Kode Pos -->
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Kode Pos</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Masukkan kode pos" />
                                    </div>
                                </div>
                            </div> --}}
                            <!-- End Kode Pos -->

                            <!-- Alamat Sesuai KTP -->
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Alamat Sesuai KTP</label>
                                        <textarea class="form-control" id="userbio" rows="4" placeholder="Masukkan alamat kamu"></textarea>
                                        <span class="form-text text-muted"><small>Example: Kp. Singkir Rt 03 Rw 01</small></span>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- End Alamat Sesuai KTP -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="bx bx-world me-1"></i> Social</h5>
                            <!-- Fb & Tw -->
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bxl-facebook-circle"></i></span>
                                            <input type="text" class="form-control" id="social-fb" placeholder="Url" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-tw" class="form-label">Twitter</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bxl-twitter"></i></span>
                                            <input type="text" class="form-control" id="social-tw" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div> --}}
                            <!-- End Fb & Tw -->

                            <!-- Ig & In -->
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-insta" class="form-label">Instagram</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bxl-instagram-alt"></i></span>
                                            <input type="text" class="form-control" id="social-insta" placeholder="Url" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-lin" class="form-label">Linkedin</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bxl-linkedin-square"></i></span>
                                            <input type="text" class="form-control" id="social-lin" placeholder="Url" />
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div> --}}
                            <!-- End Ig & In -->

                            <!-- Sky & Git -->
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-sky" class="form-label">Skype</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bxl-skype"></i></span>
                                            <input type="text" class="form-control" id="social-sky" placeholder="@username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-gh" class="form-label">Github</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bxl-github"></i></span>
                                            <input type="text" class="form-control" id="social-gh" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div> --}}
                            <!-- End Sky & Git -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="bx bxs-save"></i> Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                    <!-- End About Me -->

                    <!-- Settings -->
                    <div class="tab-pane" id="settings">
                        <form action="{{ route('adminChangePassword') }}" method="POST" id="changePasswordAdminForm">
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-cog me-1"></i> CHANGE PASSWORD</h5>
                            <!-- Old Password -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="oldpassword" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter old password" />
                                        <span class="form-text text-danger error-text small oldpassword_error"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Old Password -->

                            <!-- New Password & Confir Password -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="newpassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter new password" />
                                        <span class="form-text text-danger error-text small newpassword_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cnewpassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="cnewpassword" id="cnewpassword" placeholder="Enter confirm password" />
                                        <span class="form-text text-danger error-text small cnewpassword_error"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End New Password & Confir Password -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="bx bxs-save"></i> Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Settings -->
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

@section('javascript')
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function(){
    // UPDATE USER PERSONAL INFO
        $('#AdminInfoForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('.user_nik').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('input[name="nik"]')).val() );
                        });
                        $('.user_name').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('input[name="name"]')).val() );
                        });
                        $('.user_bio').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('textarea[name="bio"]')).val() );
                        });
                        $('.user_tempat_lahir').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('input[name="tempat_lahir"]')).val() );
                        });
                        $('.user_tanggal_lahir').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('input[name="tanggal_lahir"]')).val() );
                        });
                        $('.user_status_perkawinan').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('select[name="status_perkawinan"]')).val() );
                        });
                        $('.user_jenis_kelamin').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('select[name="jenis_kelamin"]')).val() );
                        });
                        $('.user_email').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('input[name="email"]')).val() );
                        });
                        $('.user_phone').each(function(){
                            $(this).html( $('#AdminInfoForm').find($('input[name="phone"]')).val() );
                        });
                        alert(data.msg);
                    }
                }
            })
        });

        // CHANGE AVATAR
        $(document).on('click', '#change_picture_btn', function(){
            $('#user_image').click();
        });

        $('#user_image').ijaboCropTool({
          preview : '.user_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("adminPictureUpdate") }}',
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
        });

        $('#changePasswordAdminForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('#changePasswordAdminForm')[0].reset();
                        alert(data.msg);
                    }
                }
            });
        });

    });
</script>
@endsection