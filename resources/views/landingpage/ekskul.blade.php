@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white" style="height: 100%">
        <div class="container">
            <h1 class="display-6 mb-3">Ekstrakurikuler</h1>
            <div class="row">
                @foreach ($ekskuls as $ekskul)
                    @if (in_array(pathinfo($ekskul['image'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                        <div class="col-md-4 mb-3" style="object-fit: cover;">
                            <img src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul->image) }}" alt=""
                                class="img-fluid w-100"
                                style="{{ $ekskul->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover">
                            <p class="h5 my-3">{{ $ekskul->title }}</p>
                        </div>
                    @elseif (pathinfo($ekskul['video'], PATHINFO_EXTENSION) == 'mp4')
                        <div class="col-md-4 mb-3" style="object-fit: cover;">
                            <video src="{{ asset('assets/panel/admin/video/ekskul/' . $ekskul['video']) }}"
                                class="img-fluid w-100"
                                style="{{ $ekskul->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover"
                                controls>
                            </video>
                            <p class="h5 my-3">{{ $ekskul->title }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
