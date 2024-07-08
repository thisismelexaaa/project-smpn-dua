@extends('landingpage.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid header-carousel px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/landingpage/img/smpn_2_kota_cirebon.jpg') }}" alt="Image">
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
    <div class="container-fluid container" id="profil">
        <h1>Profile</h1>
        
    </div>

    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid w-100 shadow" style="border-radius: 1%"
                        src="{{ asset('assets/landingpage/img/kepala-sekolah.jpg') }}" alt="">
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
            <div class="row g-4" id="personil">
                <h1 class="text-center">Personil</h1>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Lihat Semua Personil Kami
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($personils as $personil)
                                        <div class="item">
                                            <div class="shadow-sm border" data-wow-delay="0.1s">
                                                <div class="team-item">
                                                    <div class="position-relative overflow-hidden">
                                                        <img class="img-fluid w-100"
                                                            src="{{ asset('assets/panel/admin/images/personil/' . $personil->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="text-center p-4">
                                                        <h5 class="mb-1">{{ $personil->name }}</h5>
                                                        <span>{{ $personil->jabatan }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white py-5" id="berita">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 mb-3">Berita</p>
            </div>
            <div class="row g-4">
                @foreach ($beritas as $berita)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="mb-4">
                                <img src=" {{ asset('assets/panel/admin/images/berita/' . $berita->image) }}"
                                    alt="Image of {{ $berita->title }}" class="image-fluid shadow-sm" style="width: 100%">
                            </div>
                            <div class="my-1">
                                <span class="h5">{{ $berita->title }}</span><br>
                                <small class="text-secondary">{{ $berita->created_at->diffForHumans() }}</small>
                            </div>
                            <hr class="p-0 my-1">
                            <span class="mb-4">{!! Str::limit($berita->content, 50, '...') !!}</span>
                            <a class="btn btn-light" href="{{ route('home.show', $berita->id) }}">Selengkapnya<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

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
                <p class="text-dark"><i class="fa fa-map-marker-alt me-2"></i>Jl. Siliwangi No.82, Kebonbaru, Kec.
                    Kejaksan, Kota Cirebon, Jawa Barat 45121</p>
                <p class="text-dark"><i class="fa fa-phone-alt me-2"></i>(0231) 203075</p>
                <p class="text-dark"><i class="fa fa-envelope me-2"></i>smpn2_crbn@yahoo.co.id</p>
            </div>
        </div>
    </div>
    {{-- Maps end --}}
@endsection
