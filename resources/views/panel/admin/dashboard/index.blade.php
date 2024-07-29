@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Berita</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $beritaCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi fa-2x bi-newspaper text-gray-300"></i>
                                {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Galleri</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $gallerieCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-card-image fa-2x text-gray-300"></i>
                                {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Tenaga Pendidik
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $personilCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                                {{-- <i class="fas fa-user fa-2x text-gray-300"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>Berita</span>
                            <a href="{{ route('berita.index') }}" class="btn btn-sm btn-primary">Lihat Semua Berita</a>
                        </div>
                    </div>
                    <div class="card-body overflow-auto" style="height: 50vh">
                        @foreach ($berita as $berita)
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title w-75">{{ $berita['title'] }}</h5>
                                        <a href="{{ route('berita.show', $berita['id']) }}"
                                            class="btn btn-sm btn-primary my-auto">Lihat Berita
                                        </a>
                                    </div>
                                    <div class="d-flex">
                                        <span>{{ $berita['tgl_posting'] }}</span>
                                        <span class="mx-2">|</span>
                                        <span>{{ $berita['penulis'] }}</span>
                                    </div>
                                    <p class="card-text">{!! Str::limit($berita['content'], 100) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>Galleri</span>
                            <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-primary">Lihat Semua Galeri</a>
                        </div>
                    </div>
                    <div class="card-body overflow-auto" style="height: 50vh">
                        <div class="row">
                            @foreach ($gallerie as $gallerie)
                                @if (in_array(pathinfo($gallerie['image'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                    <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallerie['image']) }}"
                                        alt="Image" class="shadow-sm image-fluid col-md-4 mb-4"
                                        style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                                @elseif (pathinfo($gallerie['video'], PATHINFO_EXTENSION) == 'mp4')
                                    <video src="{{ asset('assets/panel/admin/video/galleries/' . $gallerie['video']) }}"
                                        class="shadow-sm image-fluid col-md-4 mb-4"
                                        style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                                    </video>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
