@extends('landingpage.app')

@section('content')
    {{-- carousel --}}
    <div class="container-fluid header-carousel px-0">
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

    {{-- rapor pendidikan --}}
    <div class="container-fluid py-5">
        <div class="container">
            <h1 class="text-white">Rapor pendidikan SMP Negeri 2 Kota Cirebon</h1>
            <div class="d-flex flex-wrap justify-content-center g-0 feature-row bg-white" id="rapor">
                {{-- <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" id="rapor-item">
                    <div class="feature-item border h-100 p-5">
                        <h5 class="mb-3" id="rapor-title"></h5>
                        <p id="rapor-nilai"></p>
                        <p id="rapor-predikat"></p>
                        <p id="rapor-keterangan"></p>
                        <p id="rapor-description" class="mb-0"></p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- personil --}}
    <div class="container-fluid container-team" id="personil">
        <div class="container">
            <div class="row g-5 py-2">
                <h1 class="display-6 text-white fw-bold mb-2">Kepala Sekolah</h1>
                <div class="col-md-6 wow fadeIn mt-2 my-4" data-wow-delay="0.3s">
                    <img class="img-fluid w-100 shadow" style="border-radius: 1%"
                        src="{{ isset($kepalaSekolah) ? asset('assets/panel/admin/images/personil/' . $kepalaSekolah->image) : asset('assets/panel/admin/images/personil/person.jpg') }}"
                        alt="">
                </div>
                <div class="col-md-6 wow fadeIn pt-2 mt-0" data-wow-delay="0.5s">
                    <div class="mb-4 bg-white p-3 shadow-sm rounded"
                        style="text-align: justify; overflow-wrap: break-word;">
                        <h1 class="display-6 text-dark">
                            {{ isset($kepalaSekolah) ? $kepalaSekolah->name : 'Kepala Sekolah SMPN 2 Kota Cirebon' }}
                        </h1>
                        {!! isset($kepalaSekolah)
                            ? $kepalaSekolah->sambutan
                            : 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt magnam aliquam magni voluptates consequuntur explicabo corrupti, sit saepe nostrum sed assumenda praesentium totam natus repellendus vero minus reprehenderit nisi iure illum suscipit quos eum quasi! Totam, vel fugit! Quasi atque optio ut possimus rem asperiores necessitatibus nobis explicabo tempore cupiditate corporis velit cumque et natus molestiae nulla minima, obcaecati eveniet enim eius, dicta, aperiam animi! Commodi deleniti quaerat dolores vel voluptatibus sapiente error nemo aperiam? Voluptatem non delectus deserunt modi voluptas sit dolore at excepturi omnis rem nulla corrupti ratione soluta harum expedita error itaque atque, sunt distinctio nemo repellendus.' !!}
                    </div>
                </div>
            </div>

            <div class="row g-4 pb-5" id="personil">
                <h1 class="display-6 text-dark fw-bold mb-2">Personil</h1>
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
                                        @if ($personil->jabatan == 2)
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
                                                            <span>
                                                                {{ $personil->jabatan == 1 ? 'Kepala Sekolah' : 'Guru' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid container-service py-5">
        {{-- prestasi --}}
        <div class="container pb-5" id="prestasi">
            <h1 class="mb-2">Prestasi SMP Negeri 2 Kota Cirebon</h1>
            <div class="row g-4">
                @foreach ($berita as $berita)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="object-fit: cover;">
                        <div class="team-item">
                            <a href="{{ route('home.show', $berita->id) }}">
                                <div class="position-relative overflow-hidden" style="border-radius: 1%">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('assets/panel/admin/images/berita/' . $berita->image) }}"
                                        alt="" style="object-fit: cover; height: 250px; width: 100%">
                                    <div class="team-social">
                                        <span class="btn text-white mx-1 w-100">
                                            {{ $berita->title }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- contact --}}
        <div class="container" style="height: 100%" id="contact">
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
        $(document).ready(function() {
            const raporPendidikanSekolah = [{
                    'title': 'Kemampuan Literasi Murid',
                    'description': 'Kemampuan literasi dinilai dari pemahaman murid terhadap teks sastra dan teks informasi',
                    'predikat': 'Baik',
                    'keterangan': 'Nilai Naik dari tahun 2023'
                },
                {
                    'title': 'Karakter Murid',
                    'description': 'Karakter murid dinilai dari akhlak, keimanan, sikap gotong royong, kreativitas, cara berpikir, dan kemandirian',
                    'predikat': 'Baik',
                    'keterangan': 'Nilai Naik dari tahun 2023'
                },
                {
                    'title': 'Kondisi Keamanan Sekolah',
                    'description': 'Kondisi keamanan sekolah dinilai dari pemahaman dan pengalaman terhadap hal-hal yang bisa mengganggu fisik dan mental',
                    'predikat': 'Baik',
                    'keterangan': 'Nilai Naik dari tahun 2023'
                },
                {
                    'title': 'Kondisi Kebinekaan Sekolah',
                    'description': 'Kondisi kebinekaan sekolah dinilai dari toleransi terhadap agama dan budaya, kesetaraan antar murid, dan komitmen',
                    'predikat': 'Baik',
                    'keterangan': 'Nilai Naik dari tahun 2023'
                },
                {
                    'title': 'Kualitas Pembelajaran',
                    'description': 'Kualitas pembelajaran dinilai dari metode pembelajaran, pengelolaan kelas, dan dukungan psikologis kepada murid',
                    'predikat': 'Baik',
                    'keterangan': 'Nilai Naik dari tahun 2023'
                },
                {
                    'title': 'Kemampuan Numerasi Murid',
                    'description': 'Kemampuan numerasi dinilai dari pemahaman murid terhadap domain bilangan, aljabar, dan geometri',
                    'predikat': 'Baik',
                    'keterangan': 'Nilai Naik dari tahun 2023'
                }
            ];

            $.each(raporPendidikanSekolah, function(index, rapor) {
                // Create HTML content for each item
                let raporHTML = `
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="feature-item border h-100 p-5">
                            <h5 class="mb-3 text-center">${rapor.title}</h5>
                            <div class="text-center mb-3">
                                <span class="bg-success px-4 py-1 text-white" style="border-radius: 20px">${rapor.predikat}</span>
                                </div>
                            <p class="text-center"s><i class="bi bi-arrow-up fw-bold text-success"></i> ${rapor.keterangan}</p>
                            <p style="text-align: justify">${rapor.description}</p>
                        </div>
                    </div>
                `;

                // Append the generated HTML to #rapor container
                $('#rapor').append(raporHTML);
            });
        });
    </script>
@endsection
