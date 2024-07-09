@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white" style="height: 100%">
        <div class="container">
            <h1 class="display-6 mb-3">Gallery</h1>
            <div class="row">
                @foreach ($galleries as $gallery)
                    <div class="col-md-4 mb-3" style="object-fit: cover;">
                        <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallery->image) }}"
                        alt="" class="img-fluid w-100"
                        style="{{ $gallery->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover">
                        <p class="h5 my-3">{{ $gallery->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
