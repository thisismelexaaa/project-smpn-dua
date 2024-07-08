@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white">
        <div class="container pt-5">
            <div class="d-flex">
                <h1>{{ $berita->title }}</h1>
                <p>
                </p>
            </div>
            <div class="d-flex">
                <img src="{{ asset('assets/panel/admin/images/berita/' . $berita->image) }}" alt="Image of {{ $berita->title }}"
                    class="image-fluid w-50 mx-auto shadow">
            </div>
            <p class="text-justify">{!! $berita->content !!}</p>
        </div>
    </div>
@endsection
