@extends('landingpage.app')

@section('content')
    <div class="container-fluid container-team py-5" id="berita" style="height: 100%">
        <div class="container pb-5">
            <h1 class="display-6 mb-3">Prestasi</h1>
            <div class="row g-2">
                @foreach ($beritas as $berita)
                    <div class="col-lg-4 col-md-6 wow fadeInUp overflow-hidden berita-card" style="border-radius: 1%;"
                        data-wow-delay="0.1s" data-category="{{ $berita['category'] }}">
                        <div class="service-item border">
                            <div class="mb-4">
                                <img src="{{ asset('assets/panel/admin/images/berita/' . $berita['image']) }}"
                                    alt="Image of {{ $berita['title'] }}" class="image-fluid shadow-sm"
                                    style="width: 100%; height: 250px; object-fit: cover">
                            </div>
                            <hr class="p-0 my-1">
                            <div class="d-flex justify-content-between my-1">
                                <span class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($berita['tgl_posting'])->isoFormat('dddd, D MMMM YYYY', 'Do MMMM YYYY') }}
                                </span>
                                <span class="text-capitalize">
                                    {{ $berita['category'] }}
                                </span>
                                <input type="hidden" class="category" value="{{ $berita['category'] }}">
                            </div>
                            <hr class="p-0 my-1">
                            <span class="h3">
                                <a class="text-dark"
                                    href="{{ route('home.show', $berita['id']) }}">{{ $berita['title'] }}</a>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
