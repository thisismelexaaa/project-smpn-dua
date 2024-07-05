@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Tambah Data Berita</span>
            </div>
            <div class="card-body">
                <form action="{{ route('berita.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <label for="title" class="form-label">Judul Berita</label>
                            <input type="text" placeholder="Judul Berita" class="form-control" id="title"
                                name="title">
                        </div>
                        <div class="col-6">
                            <label for="category" class="form-label">Kategori</label>
                            <select type="text" placeholder="" class="form-select js-states" id="category"
                                name="category">
                                <option disabled selected> Category</option>
                                <option value="pengumuman">Pengumuman</option>
                                <option value="prestasi">Prestasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="content" class="form-label">Isi Berita</label>
                            <textarea class="form-control" id="editor" name="content" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // ckeditor
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
