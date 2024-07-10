@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-wrap" style="text-align: justify; overflow-wrap: break-word;">
                    <h3>{{ $berita->title }}</h3>
                    <div class="pb-2 text-capitalize">
                        <span>{{ $berita->tgl_posting }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ $berita->penulis }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ $berita->category }}</span>
                    </div>
                    <img src="{{ asset('assets/panel/admin/images/berita/' . $berita->image) }}"
                        alt="Image of {{ $berita->title }}" class="image-fluid col-md-12 col-sm-12 mb-3"
                        style="width: 75%; height: auto">
                    {!! $berita->content !!}
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold bg-white w-100">
                        @if ($berita->category == 'prestasi')
                            Prestasi Lainnya
                        @elseif ($berita->category == 'pengumuman')
                            Pengumuman Lainnya
                        @elseif ($berita->category == 'berita')
                            Berita Lainnya
                        @endif
                    </h3>
                    <div style="height: 75vh; overflow-y: auto">
                        @foreach ($beritas as $item)
                            @if ($item->category == $berita->category)
                                <a href="">
                                    <div class="p-3 my-2 rounded border">
                                        <p class="fw-bold text-dark" style="text-align: justify">{{ $item->title }}</p>
                                        <img src="{{ asset('assets/panel/admin/images/berita/' . $item->image) }}"
                                            alt="" class="img-fluid"
                                            style="width: 100%; height: 250px; object-fit: cover">
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
