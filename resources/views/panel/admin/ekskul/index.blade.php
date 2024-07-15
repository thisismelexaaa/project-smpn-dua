@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah
                    Ekstrakurikuler</button>
            </div>
        </div>

        <div class="card mt-2 p-3">
            <table class="table table-hover table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekskuls as $ekskul)
                        <tr>
                            <td>{{ $ekskul->title }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalGambar{{ $ekskul['id'] }}">
                                    <i class="bi bi-file-image"></i>
                                </button>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modaledit{{ $ekskul['id'] }}">Edit</button>
                                    <form action="{{ route('ekskul.destroy', $ekskul->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal View Gambar --}}
                        <div class="modal fade" id="modalGambar{{ $ekskul['id'] }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Ekskul</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid rounded w-100"
                                            src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul->image) }}"
                                            alt="image of {{ $ekskul->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="modaledit{{ $ekskul['id'] }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Ekskul</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('ekskul.update', $ekskul->id) }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input required name="title" type="text" class="form-control"
                                                    id="name" value="{{ $ekskul->title }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Gambar</label>
                                                <input required name="file" type="file" class="form-control"
                                                    id="image">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Deskripsi</label>
                                                <textarea name="description" class="form-control" id="description" rows="3">
                                                    {!! $ekskul->description !!}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ekstrakurikuler</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ekskul.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Nama</label>
                                <input required name="title" type="text" class="form-control" id="name"
                                    placeholder="Ekstrakurikuler">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="image" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="image" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" cols="20" rows="2" class="form-control"
                                    placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center" id="preview-container">
                            <img class="img-fluid rounded" id="preview-image" src="https://via.placeholder.com/200"
                                alt="">
                            <video class="img-fluid rounded" id="preview-video" style="display: none;" controls></video>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        const previewFileInput = document.querySelector('#formFile');
        const previewImage = document.querySelector('#preview-image');
        const previewVideo = document.querySelector('#preview-video');

        previewFileInput.addEventListener('change', function() {
            const file = previewFileInput.files[0];
            const fileType = file.type;

            const oFReader = new FileReader();
            oFReader.readAsDataURL(file);

            oFReader.onload = function(oFREvent) {
                if (fileType.startsWith('image/')) {
                    previewImage.style.display = 'block';
                    previewVideo.style.display = 'none';
                    previewImage.src = oFREvent.target.result;
                } else if (fileType.startsWith('video/')) {
                    previewImage.style.display = 'none';
                    previewVideo.style.display = 'block';
                    previewVideo.src = oFREvent.target.result;
                } else {
                    previewImage.style.display = 'block';
                    previewVideo.style.display = 'none';
                    previewImage.src = 'https://via.placeholder.com/200';
                    alert('Unsupported file type. Please select an image or video.');
                }
            };
        });
    </script>
@endsection
