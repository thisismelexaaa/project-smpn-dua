<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMP Negeri 2 Kota Cirebon</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/landingpage/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/landingpage/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landingpage/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/landingpage/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/landingpage/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    {{-- <div class="container-fluid py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                    <small class="me-3"><i class="fa fa-clock me-2"></i>Mon-Sat 09am-5pm, Sun Closed</small>
                </div>
                <nav class="breadcrumb mb-0">
                    <a class="breadcrumb-item small text-body" href="#">Career</a>
                    <a class="breadcrumb-item small text-body" href="#">Support</a>
                    <a class="breadcrumb-item small text-body" href="#">Terms</a>
                    <a class="breadcrumb-item small text-body" href="#">FAQs</a>
                </nav>
            </div>
        </div>
    </div> --}}
    <!-- Topbar End -->


    <!-- Brand Start -->
    <div class="container-fluid text-white pt-4 pb-5 d-none d-lg-flex bg-gradient">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/640px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png"
                        alt="" class="img-fluid" style="width: 10%">
                    <div class="ms-3 h3">
                        <a href="/" class="text-white"><span>SMP Negeri 2 <br> Kota Cirebon</span></a>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="bi bi-envelope fs-2"></i>
                    <div class="ms-3">
                        <h5 class="mb-0">Mail Now</h5>
                        <span>info@example.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white">
        <nav class="container navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
            <div class="d-flex">
                <a href="index.html" class="navbar-brand d-lg-none d-flex gap-1">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/640px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png"
                            alt="" class="img-fluid" style="width: 10%">
                    <h1 class="text-primary m-0 fs-6">SMP Negeri 2 <br> Kota Cirebon</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.html" class="nav-item nav-link active">Beranda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="feature.html" class="dropdown-item">Features</a>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="appoinment.html" class="dropdown-item">Appoinment</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="about.html" class="nav-item nav-link">Berita</a>
                    <a href="service.html" class="nav-item nav-link">Gallery</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <div class="ms-auto d-none d-lg-flex">
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid header-carousel px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/landingpage/img/smpn_2_kota_cirebon.jpg') }}"
                        alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <h1 class="display-1 text-white animated slideInRight mb-3">Wellcome to Website
                                        <span class="text-header">SMP Negeri 2 Kota Cirebon</span>
                                    </h1>
                                    <p class="mb-5 animated slideInRight">Unggul Dalam Mutu Teruji Dalam Prestasi
                                        Dengan Dilandasi Iman Dan Taqwa</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Tentang
                                        Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid w-100 shadow" style="border-radius: 1%" src="{{ asset('assets/landingpage/img/kepala-sekolah.jpg') }}"
                        alt="">
                </div>
                <div class="col-md-6 wow fadeIn mt-0 pt-0" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-3 text-white">Hj. YULIA VIATIKARA, M.Pd</h1>
                    <p class="mb-1 text-white">Kepala Sekolah SMP Negeri 2 Kota Cirebon</p>
                    <p class="mb-4 bg-white p-3 shadow"
                        style="border-radius: 1%; text-align: justify; text-justify: inter-word;">Assalamu’alaikum
                        Warahmatullah Wabarakatuh.
                        <br>
                        <br>
                        Puji Syukur kami Panjatkan kehadirat Allah SWT, yang telah membeikan Rahmat dan Hidayah-Nya,
                        Sehingga website SMP Negeri 2 Kota Cirebon dapat terbit, tidak lupa Shalawat serta salam kita
                        curahkan kepada Nabi Muhammad SAW, Junjungan Kita semua.
                        <br>
                        <br>
                        Website SMP Negeri 2 Kota Cirebon ini bertujuan untuk memberikan informasi sekaligus komunikasi
                        yang bermanfaat untuk Masyarakat, orang tua wali dan warga SMP Negeri 2 Kota Cirebon Khususnya,
                        sehingga dapat terbentuknya sharing informasi yang positif dan tentunya bermanfaat bagi kita
                        semua.
                        <br>
                        <br>
                        Kami sadar bahwa website ini masih jauh dari kata sempuran, tapi kami berupaya untuk menjadi
                        lebih baik lagi, oleh karena itu kami membutuhkan saran dari semua pihak agar website menjadi
                        lebih baik lagi kedepannya.
                        <br>
                        <br>
                        Tentunya tidak lupa kami ucapkan terima kasih kepada semua pihak yang telah membantu penerbitan
                        website ini,
                        <br>
                        <br>
                        Wassalamu’alaikum Warahmatullah Wabarakatuh.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <h1 class="text-center">Personil</h1>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Lihat Semua Personil Kami
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="owl-carousel owl-theme">
                                    @for($i = 1; $i <= 10; $i++)
                                    <div class="item">
                                        <div class="shadow-sm border" data-wow-delay="0.1s">
                                            <div class="team-item">
                                                <div class="position-relative overflow-hidden">
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset('assets/landingpage/img/kepala-sekolah.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="text-center p-4">
                                                    <h5 class="mb-1">Hj. YULIA VIATIKARA, M.Pd</h5>
                                                    <span>Kepala Sekolah</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Start -->
    {{-- <div class="container-fluid testimonial py-5">
        <div class="container pt-5">
            <div class="row gy-5 gx-0">
                <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-4">What Clients Say About Our Lab Services!</h1>
                    <p class="text-white mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                        tellus augue, iaculis id elit eget, ultrices pulvinar tortor.</p>
                    <a href="" class="btn btn-primary py-3 px-5">More Testimonials</a>
                </div>
                <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white p-5">
                        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
                            <div class="testimonial-item">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-chat-left-quote text-dark"></i>
                                </div>
                                <p class="fs-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                                    tellus augue, iaculis id elit eget, ultrices pulvinar tortor. Quisque vel lorem
                                    porttitor, malesuada arcu quis, fringilla risus. Pellentesque eu consequat augue.
                                </p>
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0"
                                        src="{{ asset('assets/landingpage/img/testimonial-1.jpg') }}" alt="">
                                    <div class="ps-3">
                                        <h5 class="mb-1">Client Name</h5>
                                        <span class="text-primary">Profession</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-chat-left-quote text-dark"></i>
                                </div>
                                <p class="fs-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                                    tellus augue, iaculis id elit eget, ultrices pulvinar tortor. Quisque vel lorem
                                    porttitor, malesuada arcu quis, fringilla risus. Pellentesque eu consequat augue.
                                </p>
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0"
                                        src="{{ asset('assets/landingpage/img/testimonial-2.jpg') }}" alt="">
                                    <div class="ps-3">
                                        <h5 class="mb-1">Client Name</h5>
                                        <span class="text-primary">Profession</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->

    {{-- Maps --}}
    <div class="container py-5" style="height: 500px">
        <div class="d-flex h-100 shadow">
            <div class="col-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.502361355244!2d108.55587667587346!3d-6.708375865589129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee3cd2c05eccd%3A0x55ee252d2b9484d4!2sSMP%20Negeri%202%20Kota%20Cirebon!5e0!3m2!1sid!2sid!4v1720074334568!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-6 h-100 bg-white p-4">
                <h1 class="text-dark bg-white w-100">
                    Ayo Hubungi Kami</h1>
                <p class="fs-5 mb-4 text-dark">Mari berinteraksi dengan kami via kontak berikut ini</p>
                <p class="text-dark"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
                <p class="text-dark"><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
                <p class="text-dark"><i class="fa fa-envelope me-2"></i>info@example.com</p>
            </div>
        </div>
    </div>

    {{-- Maps end --}}

    <!-- Footer Start -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-6 pe-lg-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="h1 text-white mb-0">SMP Negeri 2<span class="text-header"><br>Kota Cirebon</span>
                        </h1>
                    </a>
                    <p>Unggul Dalam Mutu Teruji Dalam Prestasi
                        Dengan Dilandasi Iman Dan Taqwa</p>
                    {{-- <div class="d-flex mt-4">
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i
                                class="fab fa-instagram"></i></a>
                    </div> --}}
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Quick Links</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Our Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Popular Links</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Our Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="text-light mb-4">Newsletter</h4>
                            <div class="w-100">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 py-3 px-4"
                                        style="background: rgba(255, 255, 255, .1);"
                                        placeholder="Your Email Address"><button class="btn btn-primary px-4">Sign
                                        Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <p class="mb-0">Designed by <a href="https://htmlcodex.com">HTML Codex</a><br>Distributed by <a
                            href="https://themewagon.com">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/landingpage/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/landingpage/js/main.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay:true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            },
        })
    </script>
</body>

</html>
