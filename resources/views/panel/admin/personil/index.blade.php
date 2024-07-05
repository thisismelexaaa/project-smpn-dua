@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <span>Berita</span>
                    </div>
                    <div class="card-body overflow-auto" style="height: 50vh">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between w-100">
                                        <h5 class="card-title">Berita {{ $i }}</h5>
                                        <a href="#" class="text-dark">Lihat Berita ></a>
                                    </div>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of the card's content.</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <span>Gallery</span>
                    </div>
                    <div class="card-body overflow-auto" style="height: 50vh">
                        <div class="row gap-1">
                        @for ($i = 1; $i <= 20; $i++)
                            <img class="m-1 col" src="https://via.placeholder.com/200" alt="">
                        @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
