@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white" style="height: 100%">
        <div class="container">
            <h1 class="display-6 mb-3">Gallery</h1>
            <div class="row">
                @foreach ($galleries as $gallery)
                    @if (in_array(pathinfo($gallery['image'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                        <div class="col-md-4 mb-3" style="object-fit: cover;">
                            <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallery->image) }}" alt=""
                                class="img-fluid w-100"
                                style="{{ $gallery->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover">
                            <p class="h5 my-3">{{ $gallery->title }}</p>
                        </div>
                    @elseif (pathinfo($gallery['video'], PATHINFO_EXTENSION) == 'mp4')
                        <div class="col-md-4 mb-3" style="object-fit: cover;">
                            <video src="{{ asset('assets/panel/admin/video/galleries/' . $gallery['video']) }}"
                                class="img-fluid w-100"
                                style="{{ $gallery->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover"
                                controls>
                            </video>
                            <p class="h5 my-3">{{ $gallery->title }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
