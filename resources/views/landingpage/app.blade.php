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
    <link href="{{ asset('assets/panel/vendor/datatables/dataTables.min.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <div class="container-fluid sticky-top stick-lg d-none bg-white d-lg-flex py-4">
        <nav class="container navbar navbar-expand-lg navbar-light">
            <a href="/home" class="navbar-brand gap-1">
                <div class="d-flex">
                    <img src="{{ asset('assets/landingpage/img/smpn-2-logo.jpg') }}" alt=""
                        class="img-fluid me-2" style="width: 12%; border-radius: 100%">
                    <h1 class="text-dark m-0 h3 my-auto">SMP Negeri 2 <br> Kota Cirebon</h1>
                </div>
            </a>
            <div class="d-block">
                <div class="d-flex justify-content-end pe-3 pb-1">
                    <a class="btn btn-sm-square border border-dark ms-2" target="_blank"
                        href="https://www.instagram.com/smpn2cirebonofficial?igsh=dTNkeDhwaDhkOGFz"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-sm-square border border-dark ms-2" target="_blank"
                        href="https://www.facebook.com/pages/SMPN2-Kota-Cirebon/248605785250927?locale=id_ID"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square border border-dark ms-2" target="_blank"
                        href="https://www.youtube.com/@spendacherbon9064"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-sm-square border border-dark ms-2" target="_blank"
                        href="mailto:smpn2_crbn@yahoo.co.id"><i class="fa fa-envelope"></i></a>
                    {{-- <a class="btn btn-sm-square border border-dark ms-2" href=""><i
                            class="fab fa-whatsapp"></i></a> --}}
                </div>
                <div class="d-flex">
                    <x-navItem class="text-dark"></x-navItem>
                </div>
            </div>
        </nav>
    </div>

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white">
        <nav class="container navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
            <div class="d-flex">
                <a href="/home" class="navbar-brand d-lg-none d-flex gap-1">
                    <img src="{{ asset('assets/landingpage/img/smpn-2-logo.jpg') }}" alt=""
                        class="img-fluid me-2" style="width: 12%">
                    <h1 class="text-dark m-0 fs-6">SMP Negeri 2 <br> Kota Cirebon</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="d-block justify-content-end pe-3 pb-1">
                    <div class="my-4">
                        <x-navItem class="text-dark"></x-navItem>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer text-white wow fadeIn" id="contact" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-6 pe-5">
                    <a href="/" class="navbar-brand">
                        <h1 class="h1 text-white mb-0">SMP Negeri 2<span class="text-header"><br>Kota Cirebon</span>
                        </h1>
                    </a>
                    <p>Unggul Dalam Mutu Teruji Dalam Prestasi Dengan Dilandasi Iman Dan Taqwa</p>
                    <h1 class="text-white w-100">Ayo Hubungi Kami</h1>
                    <p class="">Mari berinteraksi dengan kami via kontak berikut ini</p>
                    <div class="row gy-2">
                        <a class="text-white" target="_blank"
                            href="https://www.google.com/maps?ll=-6.708235,108.558771&z=16&t=m&hl=id&gl=ID&mapclient=embed&cid=6191927413615920340">
                            <i class="fa fa-map-marker-alt me-2"></i>Jl. Siliwangi No.82, Kebonbaru,
                            Kec.
                            Kejaksan, Kota Cirebon, Jawa Barat 45121
                        </a>
                        <span class="text-white" href="">
                            <i class="fa fa-phone-alt me-2"></i>
                            (0231) 203075
                        </span>
                        <a href="mailto:smpn2_crbn@yahoo.co.id" target="_blank" class="text-white">
                            <i class="fa fa-envelope me-2"></i>
                            smpn2_crbn@yahoo.co.id
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-5">
                        <div class="col-sm-12">
                            <h4 class="text-white mb-4">Navigasi Cepat</h4>
                            <div class="row">
                                <div class="col-sm">
                                    <a href="/" class="nav-item nav-link active text-white">Beranda</a>
                                    <a href="/profile" class="nav-item nav-link text-white">Profil</a>
                                    <a href="/berita" class="nav-item nav-link text-white">Berita</a>
                                    <a href="/prestasi" class="nav-item nav-link text-white">Prestasi</a>
                                    <a href="/sarana-prasana" class="nav-item nav-link text-white">Sarana
                                        Prasaranan</a>
                                </div>
                                <div class="col-sm">
                                    <a href="/ekskul" class="nav-item nav-link text-white">Ekstrakulikuler</a>
                                    <a href="/tenaga-pendidik" class="nav-item nav-link text-white">Tenaga
                                        Pendidik</a>
                                    <a href="/gallery-foto" class="nav-item nav-link text-white">Foto</a>
                                    <a href="/gallery-video" class="nav-item nav-link text-white">Video</a>
                                    <a href="#contact" class="nav-item nav-link text-white">Kontak</a>
                                </div>
                                {{-- <div class="col-sm">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="text-light mb-4 ">Social Media</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a target="_blank"
                                        href="https://www.instagram.com/smpn2cirebonofficial?igsh=dTNkeDhwaDhkOGFz"
                                        class="nav-item d-flex gap-2 align-items-center nav-link active text-white">
                                        <i class="fab fa-instagram"></i>
                                        Instagram
                                    </a>
                                    <a target="_blank" href="https://www.youtube.com/@spendacherbon9064"
                                        class="nav-item d-flex gap-2 align-items-center nav-link text-white">
                                        <i class="fab fa-youtube"></i>
                                        Youtube
                                    </a>
                                    <a target="_blank"
                                        href="https://www.facebook.com/pages/SMPN2-Kota-Cirebon/248605785250927?locale=id_ID"
                                        class="nav-item d-flex gap-2 align-items-center nav-link text-white">
                                        <i class="fab fa-facebook-f"></i>
                                        Facebook
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.502361355244!2d108.55587667587346!3d-6.708375865589129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee3cd2c05eccd%3A0x55ee252d2b9484d4!2sSMP%20Negeri%202%20Kota%20Cirebon!5e0!3m2!1sid!2sid!4v1720074334568!5m2!1sid!2sid"
                        width="100%" height="300px" style="border:0;" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    {{-- <div class="container-fluid copyright bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a href="https://htmlcodex.com">HTML Codex</a><br>Distributed by <a
                            href="https://themewagon.com">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top shadow"><i
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

    @yield('scripts')
    @include('sweetalert::alert')

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
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
