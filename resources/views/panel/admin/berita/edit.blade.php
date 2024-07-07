@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Edit Data Berita</span>
            </div>
            <div class="card-body">
                <form action="{{ route('berita.update', $berita['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="title" class="form-label">Judul Berita</label>
                            <input type="text" placeholder="{{ $berita['title'] }}" class="form-control" id="title"
                                name="title" value="{{ $berita['title'] }}">
                            @error('title')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="category" class="form-label">Kategori</label>
                            <select type="text" placeholder="" class="form-select text-capitalize" id="category"
                                name="category">
                                <option class="text-capitalize" value="{{ $berita['category'] }}" selected>
                                    {{ $berita['category'] }}</option>
                                @if ($berita['category'] == 'prestasi')
                                    <option value="pengumuman">Pengumuman</option>
                                @else
                                    <option value="prestasi">Prestasi</option>
                                @endif
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
                            <textarea class="form-control" placeholder="Masukkan isi berita" id="editor" name="content" rows="3">{{ $berita['content'] }}</textarea>
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
        });
    </script>
@endsection
