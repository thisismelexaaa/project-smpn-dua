@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Data Berita</span>
                <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table dataTable table-hover table-striped" width="100%" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-start">#</th>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th class="text-start">Tanggal Posting</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th class="text-start">Gambar</th>
                            <th>Isi Berita</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $item)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>
                                <td>{{ $item['title'] }}</td>
                                <td>{{ $item['category'] }}</td>
                                <td class="text-start">{{ $item['tgl_posting'] }}</td>
                                <td>{{ $item['category'] }}</td>
                                <td>{{ $item['penulis'] }}</td>
                                <td class="text-start">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalGambar{{ $item['id'] }}">
                                        <i class="bi bi-file-image"></i>
                                    </button>
                                </td>
                                <td>{!! Str::limit($item['content'], 50, '...') !!}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('berita.show', $item['id']) }}"
                                            class="btn btn-sm btn-warning">View</a>
                                        <a href="{{ route('berita.edit', $item['id']) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('berita.destroy', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalGambar{{ $item['id'] }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Berita</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('assets/panel/admin/images/berita/' . $item['image']) }}"
                                                class="w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
