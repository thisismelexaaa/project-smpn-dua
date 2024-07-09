@extends('landingpage.app')

@section('content')
    <div class="container-fluid bg-white py-5" style="height: 100vh">
        <div class="container">
            <h1 class="text-dark">Profile</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab active" id="sejarah-tab" data-bs-toggle="tab" data-bs-target="#sejarah-tab-pane"
                        type="button" role="tab" aria-controls="sejarah-tab-pane"
                        aria-selected="false">Sejarah</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab" id="visi-tab" data-bs-toggle="tab" data-bs-target="#visi-tab-pane"
                        type="button" role="tab" aria-controls="visi-tab-pane" aria-selected="true">Visi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab" id="misi-tab" data-bs-toggle="tab" data-bs-target="#misi-tab-pane"
                        type="button" role="tab" aria-controls="misi-tab-pane" aria-selected="false">Misi</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active bg-white p-4" id="sejarah-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <p class="mb-4 text-center fw-bold fs-4">SEJARAH BERDIRINYA SMPN 2 KOTA CIREBON</p>
                    <div class="row">
                        <p style="text-align: justify">
                            SMPN 2 Kota Cirebon berada di lokasi Jl. Siliwangi no. 94, Kelurahan Kebon Baru, Kecamatan
                            Kejaksan
                            dan berada di Propinsi Jawa Barat. Sekolah ini berdiri sejak tahun 1955 dengan SK. No.
                            3705-BIII
                            tanggal 21 Juli 1955. Lokasi sekolah di tengah kota yang padat dengan intensitas lalu lalang
                            kendaraan yang cukup tinggi, menempati areal tanah seluas 2710 m² berdasarkan surat ukur No.
                            833/1991 tanggal 08-10-1991. Sertifikat tanah no. 24 tanggal 12 November 1993 dari Badan
                            Pertanahan
                            Nasional. Lokasi di tengah kota
                            bersebelahan dengan Balai Kota relatif mudah di jangkau oleh kendaraan dari berbagai arah
                            menyebabkan SMPN 2
                            dibanjiri pendaftar dari luar kota, termasuk dari luar propinsi yang kebetulan orang tua
                            siswa
                            dimutasi di
                            kota Cirebon. Jauh sebelum menjadi sekolah favorit yang cukup megah berlantai dengan
                            konstruksi
                            beton
                            bertulang
                            hanyalah
                            bangunan sederhana peninggalan “De Te Batavia Gevestigde Als Rechtpersoon Erkende Vereniging
                            Voor
                            Christtelijke Scholen” berdiri tahun 1933 yang kemudian ditinggalkan oleh pemiliknya.
                        </p>
                        <p style="text-align: justify">
                            Dari awal
                            berdirinya
                            hanya memiliki jumlah ruang kelas terbatas dengan konstruksi sederhana sampai menjadi
                            Sekolah
                            Standar
                            Nasional (SSN) yang dilengkapi ruang laboratorium IPA dan Bahasa, ruang komputer, ruang
                            perpustakaan, ruang
                            multi media, ruang seni dengan peralatan yang cukup memadai, ditunjang oleh keberadaan guru
                            yang
                            rata-rata
                            berstrata S1 dan 3 orang S2 menjadikan SMPN 2 sebagai tolok ukur kualitas pendidikan tingkat
                            SMP di
                            kota
                            Cirebon khususnya dan wilayah III umumnya yang meliputi kabupaten Cirebon, Kuningan,
                            Indramayu dan
                            Majalengka. Fenomena ini didukung oleh profesionalisme guru yang tinggi dan keseriusan
                            kepala
                            sekolah
                            ditambah peran serta orang tua siswa dalam wadah yang bernama komite sekolah cukup mendukung
                            berbagai
                            program kegiatan sekolah. Dari sisi prestasi, siswa SMPN 2 mempunyai banyak prestasi baik di
                            bidang
                            akademik
                            maupun non akademik, sehingga menjelang akhir tahun 2004 SMPN 2 sampai dengan sekarang
                            menjadi
                            Sekolah
                            Standar Nasional.
                        </p>
                    </div>
                </div>

                <div class="tab-pane fade bg-white p-4" id="visi-tab-pane" role="tabpanel"
                    aria-labelledby="home-tab" tabindex="0">Unggul Dalam Mutu Teruji Dalam Prestasi
                    Dengan Dilandasi Iman Dan Taqwa
                </div>

                <div class="tab-pane fade bg-white p-4" id="misi-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Dalam rangka mencapai visi tersebut, perlu dijabarkan menjadi beberapa misi. Adapun misi SMP
                                Negeri 2 Kota Cirebon sebagai berikut :</p>
                            <ol>
                                <li>Menciptakan profil pelajar Pancasila yang berakhlak mulia dan rajin beribadah</li>
                                <li>Menciptakan lingkungan belajar yang religius dan kondusif</li>
                                <li>Melaksanakan proses belajar mengajar yang efektif dan efisien untuk mendapatkan hasil
                                    yang
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
            </div>
        </div>
    </div>
@endsection
