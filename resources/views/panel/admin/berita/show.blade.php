@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-header">
                <span class="h1 fw-bold">{{ $berita['title'] }}</span>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span>{{ $berita['tgl_posting'] }}</span>
                    <span>{{ $berita['penulis'] }}</span>
                </div>
                <hr class="border-dark mx-auto">
                <img src="{{ asset('assets/panel/admin/images/berita/' . $berita['image']) }}" alt="Image" class="image-fluid text-center w-25">
                <p class="text-justify">{!! $berita['content'] !!}</p>
            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
