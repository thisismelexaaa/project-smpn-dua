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

    <!-- Brand Start -->
    <div class="container-fluid text-white pt-4 pb-5 d-none d-lg-flex bg-gradient">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <img src="{{ asset('assets/landingpage/img/smpn-2-logo.jpg') }}" alt="" class="img-fluid"
                        style="width: 10%; border-radius: 100%">
                    <div class="ms-3 h3 my-auto">
                        <a href="/home" class="text-white"><span>SMP Negeri 2 <br> Kota Cirebon</span></a>
                    </div>
                </div>
                <div class="d-block">
                    <div class="d-flex justify-content-end pe-3 pb-1">
                        <a class="btn btn-sm-square bg-white ms-2" target="_blank" href=""><i
                                class="fab text-dark fa-instagram"></i></a>
                        <a class="btn btn-sm-square bg-white ms-2" target="_blank" href=""><i
                                class="fab text-dark fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square bg-white ms-2" target="_blank" href=""><i
                                class="fab text-dark fa-youtube"></i></a>
                        <a class="btn btn-sm-square bg-white ms-2" target="_blank"
                            href="mailto:smpn2_crbn@yahoo.co.id"><i class="fa text-dark fa-envelope"></i></a>
                        <a class="btn btn-sm-square bg-white ms-2" target="_blank" href="https://wa.me/0231203075"><i
                                class="fab text-dark fa-whatsapp"></i></a>

                    </div>
                    <div class="d-flex">
                        <x-nav-item></x-nav-item>
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
                <a href="/home" class="navbar-brand d-lg-none d-flex gap-1">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/640px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png"
                        alt="" class="img-fluid me-2" style="width: 12%">
                    <h1 class="text-dark m-0 fs-6">SMP Negeri 2 <br> Kota Cirebon</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="d-flex justify-content-end pe-3 pb-1">
                    <x-nav-item></x-nav-item>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    @yield('content')

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
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Navigasi Cepat</h4>
                            <x-nav-item></x-nav-item>
                        </div>
                        <div class="col-sm-6 d-none">
                            <h4 class="text-light mb-4">Quick Links</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Our Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                    </div>
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
