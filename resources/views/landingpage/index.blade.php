@extends('landingpage.app')

@section('content')
    {{-- Hero --}}
    <div class="container-fluid hero-section py-5">
        <div class="container">
            <div class="overlay"></div>
            <div class="bg-hero"></div>
            <div class="row hero justify-content-start">
                <div class="col-lg-6 text-start">
                    <div class="welcome-text">
                        <h1 class="display-1 text-white animated slideInRight mb-3">Welcome to Website <br>
                            <span class="text-header">SMP Negeri 2 Kota Cirebon</span>
                        </h1>
                        <p class="mb-5 text-white animated slideInRight fs-4">Unggul Dalam Mutu Teruji Dalam Prestasi
                            Dengan Dilandasi Iman Dan Taqwa</p>
                        <a href="#raport" class="btn btn-primary py-3 px-5 animated slideInRight">Tentang
                            Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- rapor pendidikan --}}
    {{-- <div class="container-fluid container-rapor py-5" id="raport">
    </div> --}}

    {{-- personil --}}
    <div class="container-fluid container-service py-5" id="personil">
        <div class="container pb-5">
            <h1 class="mb-3 fadeIn text-white" data-wow-delay="0.3s" style="text-shadow: 2px 2px black">
                Rapor pendidikan SMP Negeri 2 Kota Cirebon
            </h1>
            <div class="d-flex flex-wrap justify-content-center g-0 feature-row bg-white fadeIn" id="rapor"
                data-wow-delay="0.3s">
            </div>
        </div>

        <div class="container pb-5">
            <div class="row py-2">
                <h1 class="display-6 fw-bold mb-3 text-white" style="text-shadow: 2px 2px black">Kepala Sekolah</h1>
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
        </div>

        <div class="container pb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-6 mb-3 text-white" style="text-shadow: 2px 2px black">Ekstrakulikuler</h1>
                {{-- <a href="{{ route('berita') }}" class="btn btn-primary btn-sm shadow">Lihat Semua Berita</a> --}}
            </div>
            <div class="row g-2">
                @if (count($ekskuls) == 0)
                    <h5 class="text-center text-white" style="text-shadow: 2px 2px black">Tidak ada Ekstrakulikuler</h5>
                @endif
                @foreach ($ekskuls as $ekskul)
                    <div class="col-lg-4 col-md-4 wow fadeInUp overflow-hidden fadeIn shadow"
                        data-wow-delay="0.2s"style="border-radius: 1%;" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul['image']) }}"
                                        alt="Image of {{ $ekskul['title'] }}" class="image-fluid shadow-sm"
                                        style="width: 100%; height: 250px; object-fit: cover">
                                </div>
                                <a class="text-dark h5" href="{{ route('home.show', $ekskul['id']) }}">
                                    {{ $ekskul['title'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container pb-5" id="prestasi">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-3 text-white" style="text-shadow: 2px 2px black">Prestasi SMP Negeri 2 Kota Cirebon</h1>
                <a href="{{ route('prestasi') }}" class="btn btn-primary btn-sm shadow">Lihat Semua Prestasi</a>
            </div>

            <div class="row g-4 fadeIn" data-wow-delay="0.2s">
                @if (count($prestasi) == 0)
                    <h5 class="text-center text-white" style="text-shadow: 2px 2px black">Tidak ada prestasi</h5>
                @endif
                @foreach ($prestasi as $prestasi)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="object-fit: cover;">
                        <div class="team-item">
                            <a href="{{ route('home.show', $prestasi->id) }}">
                                <div class="position-relative overflow-hidden" style="border-radius: 1%">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('assets/panel/admin/images/berita/' . $prestasi->image) }}"
                                        alt="" style="object-fit: cover; height: 250px; width: 100%">
                                    <div class="team-social">
                                        <span class="btn text-white mx-1 w-100">
                                            {{ $prestasi->title }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container pb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-6 mb-3 text-white" style="text-shadow: 2px 2px black;">Berita</h1>
                <a href="{{ route('berita') }}" class="btn btn-primary btn-sm shadow">Lihat Semua Berita</a>
            </div>
            <div class="row g-2">
                @if (count($pengumuman) == 0)
                    <h5 class="text-center text-white" style="text-shadow: 2px 2px black">Tidak ada pengumuman</h5>
                @endif
                @foreach ($pengumuman as $pengumuman)
                    <div class="col-lg-4 col-md-6 wow fadeInUp overflow-hidden fadeIn shadow"
                        data-wow-delay="0.2s"style="border-radius: 1%;" data-wow-delay="0.1s"
                        data-category="{{ $pengumuman['category'] }}">
                        <div class="service-item">
                            <div class="h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('assets/panel/admin/images/berita/' . $pengumuman['image']) }}"
                                        alt="Image of {{ $pengumuman['title'] }}" class="image-fluid shadow-sm"
                                        style="width: 100%; height: 250px; object-fit: cover">
                                </div>
                                <hr class="p-0 my-1">
                                <div class="d-flex justify-content-between my-1">
                                    <span class="text-capitalize">
                                        <i class="bi bi-calendar-week"></i>
                                        {{ \Carbon\Carbon::parse($pengumuman['tgl_posting'])->isoFormat('dddd, D MMMM YYYY', 'Do MMMM YYYY') }}
                                    </span>
                                    <span class="text-capitalize">
                                        <i class="bi bi-bookmark-fill"></i> {{ $pengumuman['category'] }}
                                    </span>
                                    <input type="hidden" class="category" value="{{ $pengumuman['category'] }}">
                                </div>
                                <hr class="p-0 my-1">
                                <a class="text-dark h5" href="{{ route('home.show', $pengumuman['id']) }}">
                                    {{ $pengumuman['title'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container pb-5">
            <h1 class="display-6 text-white mb-4" style="text-shadow: 2px 2px black">Kritik dan Saran</h1>
            <form action="{{ route('kritikDanSaran.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                                aria-label="Masukkan Nama Lengkap" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input re type="email" class="form-control" name="email" placeholder="Email"
                                aria-label="Masukkan Email" aria-describedby="basic-addon1"></input>
                        </div>
                    </div>
                    {{-- <div class="col-md">
                            <select name="type" class="form-select text-capitalize" id="">
                                <option selected disabled>Pilih</option>
                                <option value="1">masyarakat</option>
                                <option value="2">guru</option>
                                <option value="3">siswa</option>
                            </select>
                        </div> --}}
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Kritik dan saran</span>
                            <textarea class="form-control" name="message" aria-label="With textarea"
                                placeholder="Masukkan Kritik dan saran maksimal 250 kata" maxlength="250"></textarea>
                        </div>
                    </div>
                    <div class="cold-md-12">
                        <div class="text-center">
                            <h3 class="text-white" style="text-shadow: 2px 2px black">Berikan kami nilai</h3>
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" class="btn-check" name="rating"
                                        id="btnradio{{ $i }}" autocomplete="off"
                                        onclick="fillStar({{ $i }})" value="{{ $i }}">
                                    <label class="mx-2 h1" for="btnradio{{ $i }}">
                                        <i class="bi bi-star text-warning" style="cursor: pointer"
                                            id="star{{ $i }}"></i>
                                    </label>
                                @endfor
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3 w-25">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- prestasi & berita --}}
    {{-- <div class="container-fluid container-team pt-5">

    </div> --}}

    {{-- kritik dan saran --}}
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row gy-5 gx-0">
                <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-4">Apa yang orang katakan tentang kami?</h1>
                    <p class="text-white mb-5" style="text-align: justify">
                        Orang-orang yang terlibat dengan sekolah kami sangat menghargai pengalaman belajar yang mereka
                        peroleh. Mereka merasa bahwa lingkungan yang ramah dan pendidik yang berdedikasi membuat proses
                        belajar menjadi menyenangkan dan bermanfaat. Beberapa juga menyatakan bahwa mereka merasa didukung
                        dalam mengembangkan bakat dan minat, baik dalam bidang akademik maupun non-akademik. Berikut
                        beberapa komentar dari mereka:
                    </p>
                </div>
                <div class="col-lg-6 mb-n5 py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white p-4">
                        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
                            @foreach ($masukan as $index => $masukan)
                                @if ($masukan['status'] == 1)
                                    <div class="testimonial-item mx-3">
                                        <div class="d-flex align-items-center">
                                            <div class="py-2">
                                                <span class="mb-2">
                                                    <span class="h5">{{ $masukan->name }}</span>
                                                    <span class="text-secondary mx-2">|</span>
                                                    <span class="text-secondary">{{ $masukan->email }}</span>
                                                </span>
                                                <br>
                                                <span class="text-primary text-wrap">
                                                    @if ($masukan->type == 1)
                                                        <span>Masyarakat</span>
                                                    @elseif ($masukan->type == 2)
                                                        <span>Guru SMP Negeri 2 Kota Cirebon</span>
                                                    @elseif ($masukan->type == 3)
                                                        <span>Siswa SMP Negeri 2 Kota Cirebon</span>
                                                    @endif
                                                </span>
                                                <br>
                                                @for ($i = 1; $i <= $masukan['rating']; $i++)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="fs-5 mb-4" style="text-align: justify; word-wrap: break-word;">
                                            {{ $masukan->message }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
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

            // Function to fill stars
            fillStar = (star) => {
                for (let i = 1; i <= 5; i++) {
                    if (i <= star) {
                        $('#star' + i).removeClass('bi-star').addClass('bi-star-fill');
                    } else {
                        $('#star' + i).removeClass('bi-star-fill').addClass('bi-star');
                    }
                }
            }
        });
    </script>
@endsection
