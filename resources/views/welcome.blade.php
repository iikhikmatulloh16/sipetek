@extends('layouts.app')
@section('title', 'Beranda | SI Pengaduan Tenaga Kerja')
    
@section('content')
<!-- Hero Start -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="mt-md-4">
                    <div>
                        <span class="badge bg-danger rounded-pill">New</span>
                        <span class="text-white-50 ms-1">Welcome to S I P E T E K</span>
                    </div>
                    <h2 class="text-white fw-normal mb-4 mt-3 hero-title">Jadikan Suara Anda Sebagai Perubahan</h2>

                    <p class="mb-4 font-16 text-white-50">Sipetek is a web application that accommodates various complaints from workers in Subang Regency.</p>

                    <a href="{{ route('register') }}" class="btn btn-success">Get Started <i class="mdi mdi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-5 offset-md-2">
                <div class="text-md-end mt-3 mt-md-0">
                    <img src="assets/images/startup.svg" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero End -->

<!-- What We Do Start -->
<section class="what-we-do py-5">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                    <h3>What do we do to address <span class="text-primary">worker complaints</span></h3>
                    <p class="text-muted mt-2">The clean and well commented code allows easy customization of the theme.It's designed for <br />describing your app, agency or business.</p>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-lg-4">
                <div class="text-center icon-box p-3">
                    <div class="avatar-sm m-auto">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-desktop text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Responsive Layouts</h4>
                    <p class="text-muted mt-2 mb-0">Et harum quidem rerum as expedita distinctio nam libero tempore cum soluta nobis est cumque quo.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-center icon-box p-3">
                    <div class="avatar-sm m-auto">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-vector text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Based on Bootstrap UI</h4>
                    <p class="text-muted mt-2 mb-0">Temporibus autem quibusdam et aut officiis necessitatibus saepe eveniet ut sit et recusandae.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-center icon-box p-3">
                    <div class="avatar-sm m-auto">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-flag text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Creative Design</h4>
                    <p class="text-muted mt-2 mb-0">Nam libero tempore, cum soluta a est eligendi minus id quod maxime placeate facere assumenda est.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- What We Do End -->

<!-- Procedure Start -->
<section class="procedure py-5 bg-light-lighten border-top border-bottom border-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-heart-multiple-outline"></i></h1>
                    <h3>What is the procedure for <span class="text-danger">filing a complaint</span></h3>
                    <p class="text-muted mt-2">Hyper comes with next generation ui design and have multiple benefits</p>
                </div>
            </div>
        </div>

        <div class="row g-3 pt-4">
            <div class="col-lg-4">
                <div class="icon-box p-3">
                    <div class="avatar-sm">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-user-plus text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Melakukan Pendaftaran</h4>
                    <p class="text-muted mt-2 mb-0">Et harum quidem rerum as expedita distinctio nam libero.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="icon-box p-3">
                    <div class="avatar-sm">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-pencil text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Menuliskan Pengaduan</h4>
                    <p class="text-muted mt-2 mb-0">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="icon-box p-3">
                    <div class="avatar-sm">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-file text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Verifikasi Pengaduan</h4>
                    <p class="text-muted mt-2 mb-0">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="icon-box p-3">
                    <div class="avatar-sm">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-sync text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Pengaduan di Proses</h4>
                    <p class="text-muted mt-2 mb-0">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="icon-box p-3">
                    <div class="avatar-sm">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-chat text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Menerima Tanggapan</h4>
                    <p class="text-muted mt-2 mb-0">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="icon-box p-3">
                    <div class="avatar-sm">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="bx bx-check-double text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">Pengaduan Selesai</h4>
                    <p class="text-muted mt-2 mb-0">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Procedure End -->

<!-- FAQs Start -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-frequently-asked-questions"></i></h1>
                    <h3>Frequently Asked <span class="text-primary">Questions</span></h3>
                    <p class="text-muted mt-2">Here are some of the basic types of questions for our customers. For more <br />information please contact us.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-4">
            <div class="col-md-10">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="bx bxs-help-circle text-danger me-1"></i> Kenapa saya tidak bisa melakukan login?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the
                                overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any
                                HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="bx bxs-help-circle text-danger me-1"></i> Kenapa pengaduan saya hilang?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the
                                overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any
                                HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="bx bxs-help-circle text-danger me-1"></i> Kenapa pengaduan saya tidak di proses
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the
                                overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any
                                HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="bx bxs-help-circle text-danger me-1"></i> Kenapa saya tidak bisa melakukan pengaduan?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the
                                overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any
                                HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQs End -->

<!-- Contact Start -->
<section class="contact py-5 bg-light-lighten border-top border-bottom border-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-human-greeting-proximity"></i></h1>
                    <h3>Get In <span class="text-primary">Touch</span></h3>
                    <p class="text-muted mt-2">Please fill out the following form and we will get back to you shortly. For more <br />information please contact us.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="text-center icon-box p-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="bx bx-map-pin text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Location</h4>
                            <p class="text-muted mt-2 mb-0">Jl. Mayjen Sutoyo Siswomiharjo <br />No.48 Subang - Jawa Barat 41211</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center icon-box p-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="bx bx-message text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Email</h4>
                            <p class="text-muted mt-2 mb-0">iikhikmatulloh99@gmail.com <br />kemnaker@nkri.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center icon-box p-3">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title bg-primary-lighten rounded-circle">
                                    <i class="bx bx-phone text-primary font-24"></i>
                                </span>
                            </div>
                            <h4 class="mt-3">Call</h4>
                            <p class="text-muted mt-2 mb-0">+62 89606998552 <br />(0260) 412655</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <form>
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="fullname" class="form-label">Your Name</label>
                                <input class="form-control form-control-light" type="text" id="fullname" placeholder="Name..." />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="emailaddress" class="form-label">Your Email</label>
                                <input class="form-control form-control-light" type="email" required="" id="emailaddress" placeholder="Enter you email..." />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label for="subject" class="form-label">Your Subject</label>
                                <input class="form-control form-control-light" type="text" id="subject" placeholder="Enter subject..." />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label for="comments" class="form-label">Message</label>
                                <textarea id="comments" rows="4" class="form-control form-control-light" placeholder="Type your message here..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Send Message <i class="bx bxl-telegram ms-1"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact End -->
@endsection