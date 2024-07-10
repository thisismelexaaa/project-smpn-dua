@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5>Setting Aplikasi</h5>
                        <hr>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label for="" class="form-label">Nama Aplikasi</label>
                                    <input type="text" class="form-control" placeholder="Nama Aplikasi">
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="" class="form-label">Logo Aplikasi</label>
                                    <input type="file"s class="form-control" placeholder="Nama Aplikasi">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 border-left">
                        <h5>Setting Akun Admin</h5>
                        <hr>
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama Aplikasi">
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="Nama Aplikasi">
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Password</label>
                                    <input type="text" class="form-control" placeholder="Nama Aplikasi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
