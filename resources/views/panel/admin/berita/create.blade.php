@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Tambah Data Berita</span>
            </div>
            <div class="card-body">
                <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="text" hidden name="kode" id="kode_berita">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="title" class="form-label">Judul Berita</label>
                            <input type="text" placeholder="Judul Berita" class="form-control" id="title"
                                name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="category" class="form-label">Kategori</label>
                            <select type="text" placeholder="" class="form-select js-states" id="category"
                                name="category">
                                <option disabled selected>Category</option>
                                <option value="pengumuman">Pengumuman</option>
                                <option value="prestasi">Prestasi</option>
                            </select>
                            @error('category')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="category" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <p class="text-danger text-sm mt-1">*Gambar harus bertipe jpg, jpeg, png</p>
                            @error('category')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="content" class="form-label">Isi Berita</label>
                            <textarea class="form-control" placeholder="Masukkan isi berita" id="editor" name="content" rows="3">
                                {{ old('content') }}
                            </textarea>
                            @error('description')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    <button type="button" class="btn btn-secondary mt-3" onclick="window.history.back()">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                        'blockQuote'
                    ]
                })
                .catch(error => {
                    console.error(error);
                });

            $('#kode_berita').val(Math.random().toString(36).substr(2, 6));

        });
    </script>
@endsection
