@extends('landingpage.app')

@section('content')
    <div class="container-fluid header-carousel px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/landingpage/img/smpn_2_kota_cirebon.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <h1 class="display-1 text-white animated slideInRight mb-3">Wellcome to Website <br>
                                        <span class="text-header">SMP Negeri 2 Kota Cirebon</span>
                                    </h1>
                                    <p class="mb-5 animated slideInRight fs-4">Unggul Dalam Mutu Teruji Dalam Prestasi
                                        Dengan Dilandasi Iman Dan Taqwa</p>
                                    <a href="#profil" class="btn btn-primary py-3 px-5 animated slideInRight">Tentang
                                        Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid container-team">
        <div class="container pb-5" id="profil">
            <h1 class="text-white">Profile</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab active" id="visi-tab" data-bs-toggle="tab" data-bs-target="#visi-tab-pane"
                        type="button" role="tab" aria-controls="visi-tab-pane" aria-selected="true">Visi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab" id="misi-tab" data-bs-toggle="tab" data-bs-target="#misi-tab-pane"
                        type="button" role="tab" aria-controls="misi-tab-pane" aria-selected="false">Misi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab" id="sejarah-tab" data-bs-toggle="tab" data-bs-target="#sejarah-tab-pane"
                        type="button" role="tab" aria-controls="sejarah-tab-pane" aria-selected="false">Sejarah</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active bg-white p-4" id="visi-tab-pane" role="tabpanel"
                    aria-labelledby="home-tab" tabindex="0">Unggul Dalam Mutu Teruji Dalam Prestasi
                    Dengan Dilandasi Iman Dan Taqwa</div>
                <div class="tab-pane fade bg-white p-4" id="misi-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Dalam rangka mencapai visi tersebut, perlu dijabarkan menjadi beberapa misi. Adapun misi SMP
                                Negeri 2 Kota Cirebon sebagai berikut :</p>
                            <ol>
                                <li>Menciptakan profil pelajar Pancasila yang berakhlak mulia dan rajin beribadah</li>
                                <li>Menciptakan lingkungan belajar yang religius dan kondusif</li>
                                <li>Melaksanakan proses belajar mengajar yang efektif dan efisien untuk mendapatkan hasil yang
                                    optimal.
                                </li>
                                <li>Meningkatkan prestasi non akademik peserta didik sesuai bakat dan minat.</li>
                                <li>Meningkatkan profesionalitas pendidik dan tenaga kependidikan</li>
                                <li>Melaksanakan pemeliharaan lingkungan sekolah yang asri dan nyaman</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                SPENDA BERAKSI
                                <br>
                                <br>
                                ( BERSIH, EMPATI, RELIGIUS, AKTIF, KREATIF, SEMANGAT, INOVATIF)
                                <br>
                                <br>
                                BERSIH LINGKUNGAN SEKOLAH MENJADI BUDAYA KESEHARIAN
                                <br>
                                <br>
                                EMPATI WUJUD KASIH SAYANG SESAMA INSANI
                                <br>
                                <br>
                                RELIGIUS DALAM SETIAP LANGKAH
                                <br>
                                <br>
                                AKTIF DISEGALA BIDANG
                                <br>
                                <br>
                                KREATIF MENCIPTAKAN IDE BARU
                                <br>
                                <br>
                                SEMANGAT MENJALANKAN KEWAJIBAN
                                <br>
                                <br>
                                INOFATIF MAMPU MENGEMBANGKAN DIRI MEMUNCULKAN IDE BARU
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade bg-white p-4" id="sejarah-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <p class="mb-4 text-center fw-bold fs-4">SEJARAH BERDIRINYA SMPN 2 KOTA CIREBON</p>
                    <divs class="row">
                        <div class="col-sm-6">
                            <p style="text-align: justify">
                                SMPN 2 Kota Cirebon berada di lokasi Jl. Siliwangi no. 94, Kelurahan Kebon Baru, Kecamatan Kejaksan
                                dan berada di Propinsi Jawa Barat. Sekolah ini berdiri sejak tahun 1955 dengan SK. No. 3705-BIII
                                tanggal 21 Juli 1955. Lokasi sekolah di tengah kota yang padat dengan intensitas lalu lalang
                                kendaraan yang cukup tinggi, menempati areal tanah seluas 2710 m² berdasarkan surat ukur No.
                                833/1991 tanggal 08-10-1991. Sertifikat tanah no. 24 tanggal 12 November 1993 dari Badan Pertanahan
                                Nasional. Lokasi di tengah kota
                                bersebelahan dengan Balai Kota relatif mudah di jangkau oleh kendaraan dari berbagai arah
                                menyebabkan SMPN 2
                                dibanjiri pendaftar dari luar kota, termasuk dari luar propinsi yang kebetulan orang tua siswa
                                dimutasi di
                                kota Cirebon. Jauh sebelum menjadi sekolah favorit yang cukup megah berlantai dengan konstruksi
                                beton
                                bertulang
                                hanyalah
                                bangunan sederhana peninggalan “De Te Batavia Gevestigde Als Rechtpersoon Erkende Vereniging Voor
                                Christtelijke Scholen” berdiri tahun 1933 yang kemudian ditinggalkan oleh pemiliknya.
                            </p>
                        </div>
                        <div class="colsm-6">
                            <p style="text-align: justify">
                                Dari awal
                                berdirinya
                                hanya memiliki jumlah ruang kelas terbatas dengan konstruksi sederhana sampai menjadi Sekolah
                                Standar
                                Nasional (SSN) yang dilengkapi ruang laboratorium IPA dan Bahasa, ruang komputer, ruang
                                perpustakaan, ruang
                                multi media, ruang seni dengan peralatan yang cukup memadai, ditunjang oleh keberadaan guru yang
                                rata-rata
                                berstrata S1 dan 3 orang S2 menjadikan SMPN 2 sebagai tolok ukur kualitas pendidikan tingkat SMP di
                                kota
                                Cirebon khususnya dan wilayah III umumnya yang meliputi kabupaten Cirebon, Kuningan, Indramayu dan
                                Majalengka. Fenomena ini didukung oleh profesionalisme guru yang tinggi dan keseriusan kepala
                                sekolah
                                ditambah peran serta orang tua siswa dalam wadah yang bernama komite sekolah cukup mendukung
                                berbagai
                                program kegiatan sekolah. Dari sisi prestasi, siswa SMPN 2 mempunyai banyak prestasi baik di bidang
                                akademik
                                maupun non akademik, sehingga menjelang akhir tahun 2004 SMPN 2 sampai dengan sekarang menjadi
                                Sekolah
                                Standar Nasional.
                            </p>
                        </div>
                    </divs>
                </div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                    ...</div>
            </div>
        </div>
        <div class="container pb-5">
            <div class="row g-5 mb-5">
                <h1 class="display-6 text-white fw-bold mb-2">Kepala Sekolah</h1>
                <div class="col-md-6 wow fadeIn mt-2 py-0 pe-0" data-wow-delay="0.3s">
                    <img class="img-fluid w-100 shadow" style="border-radius: 1%"
                        src="{{ asset('assets/landingpage/img/kepala-sekolah.jpg') }}" alt="">
                </div>
                <div class="col-md-6 wow fadeIn mt-0 pt-0" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4 text-white">Hj. YULIA VIATIKARA, M.Pd</h1>
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
                <h1 class="display-6 text-dark fw-bold mb-2">Personil</h1>
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

    <div class="container-fluid container-service py-5" id="profil">
        <div class="container mb-5" id="berita">
            <div class="d-flex justify-content-between wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-6 mb-3">Informasi</h1>
                <select name="category" id="selectCategory" class="form-select w-25 h-25">
                    <option value="all">Semua Kategori</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="pengumuman">Pengumuman</option>
                </select>
            </div>
            <div class="row g-4">
                @foreach ($beritas as $berita)
                    <div class="col-lg-3 col-md-6 wow fadeInUp overflow-hidden berita-card" style="border-radius: 1%;"
                        data-wow-delay="0.1s" data-category="{{ $berita['category'] }}">
                        <div class="service-item border">
                            <div class="mb-4">
                                <img src="{{ asset('assets/panel/admin/images/berita/' . $berita['image']) }}"
                                    alt="Image of {{ $berita['title'] }}" class="image-fluid shadow-sm"
                                    style="width: 100%; height: 150px">
                            </div>
                            <span class="h5">{{ $berita['title'] }}</span><br>
                            <hr class="p-0 my-1">
                            <div class="row my-1">
                                <small class="text-capitalize text-secondary col-12">{{ $berita['tgl_posting'] }}</small>
                                <small class="text-capitalize text-secondary col-12">Ditulis Oleh :
                                    {{ $berita['penulis'] }}</small>
                                <small class="text-capitalize text-secondary col-12">Category :
                                    {{ $berita['category'] }}</small>
                                <input type="hidden" class="category" value="{{ $berita['category'] }}">
                            </div>
                            <hr class="p-0 my-1">
                            <span class="mb-4">{!! Str::limit($berita['content'], 50, '...') !!}</span>
                            <a class="btn btn-light" href="{{ route('home.show', $berita['id']) }}">Selengkapnya<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>

                    <script>
                        $(document).ready(() => {
                            // Filter cards based on the selected category
                            function filterCards(category) {
                                $('.berita-card').each(function() {
                                    let cardCategory = $(this).data('category');
                                    if (category === 'all' || category === cardCategory) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                });
                            }

                            // Initial filter based on default selected value
                            let category = $('#selectCategory').val();
                            filterCards(category);

                            // Filter cards when the category changes
                            $('#selectCategory').on('change', function() {
                                category = $(this).val();
                                filterCards(category);
                            });
                        });
                    </script>
                @endforeach
            </div>
        </div>

        <div class="container mb-5" id="galleries">
            <h1 class="display-6 mb-3">Gallery</h1>
            <div class="container">
                <div class="row">
                    @foreach ($galleries as $gallery)
                        <div class="col-md-4">
                            <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallery->image) }}" alt=""
                                class="img-fluid">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container mb-5" style="height: 500px">
            <div class="row h-100 shadow g-0">
                <div class="col-md-6 col-sm-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.502361355244!2d108.55587667587346!3d-6.708375865589129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee3cd2c05eccd%3A0x55ee252d2b9484d4!2sSMP%20Negeri%202%20Kota%20Cirebon!5e0!3m2!1sid!2sid!4v1720074334568!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 col-sm-12 h-100 bg-white p-4">
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
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            try {
                // Filter cards based on the selected category
                function filterCards(category) {
                    $('.berita-card').each(function() {
                        let cardCategory = $(this).data('category');
                        $(this).toggle(category === 'all' || category === cardCategory);
                    });
                }

                // Initial filter based on default selected value
                let category = $('#selectCategory').val();
                filterCards(category);

                // Filter cards when the category changes
                $('#selectCategory').on('change', function() {
                    category = $(this).val();
                    filterCards(category);
                });

                // Update tab classes
                function updateTabClasses(tabId, activeClass, inactiveClass) {
                    $(tabId).toggleClass(activeClass, $(tabId).hasClass('active'))
                        .toggleClass(inactiveClass, !$(tabId).hasClass('active'));
                }

                // Add event listeners to tabs
                $('.tab').on('click', function() {
                    $('.tab').removeClass('active');
                    $(this).addClass('active');
                    updateTabClasses('#misi-tab', 'text-dark', 'text-white');
                    updateTabClasses('#visi-tab', 'text-dark', 'text-white');
                    updateTabClasses('#sejarah-tab', 'text-dark', 'text-white');
                });

                // Initial update of tab classes
                updateTabClasses('#misi-tab', 'text-dark', 'text-white');
                updateTabClasses('#visi-tab', 'text-dark', 'text-white');
                updateTabClasses('#sejarah-tab', 'text-dark', 'text-white');

            } catch (e) {
                console.error('Error initializing scripts:', e);
            }
        });
    </script>
@endsection
