@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <span>Data Personil</span>
                    </div>
                    <div class="card-body overflow-auto" style="height: 50vh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 10; $i++)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>Fatul Awikwok</td>
                                        <td>Kepala Sekolah</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
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
