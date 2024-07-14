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
            @if ($ekskuls->isEmpty())
                <h4>Tidak ada Ekstrakurikuler</h4>
            @endif
            <div class="row">
                @foreach ($ekskuls as $j => $ekskul)
                    <div class="col-md-3 rounded overflow-hidden gallerie">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $j }}">
                            @if (in_array(pathinfo($ekskul['image'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                <img src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul['image']) }}"
                                    alt="Image" class="shadow-sm image-fluid w-100"
                                    style="{{ $ekskul['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                            @elseif (pathinfo($ekskul['video'], PATHINFO_EXTENSION) == 'mp4')
                                <video src="{{ asset('assets/panel/admin/video/ekskul/' . $ekskul['video']) }}"
                                    class="shadow-sm image-fluid w-100"
                                    style="{{ $ekskul['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                                </video>
                            @endif
                        </a>
                        <div class="my-2">
                            <p class="text-capitalize fw-bold mt-3 text-justify" style="text-wrap: wrap">
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $j }}">
                                    {{ $ekskul['title'] }}
                                </a>
                            </p>
                        </div>

                        <div class="modal fade" id="exampleModal{{ $j }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        {{-- <h5 class="modal-title">Modal title</h5> --}}
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if (in_array(pathinfo($ekskul['image'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                            <img src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul['image']) }}"
                                                alt="Image" class="shadow-sm image-fluid w-100"
                                                style="{{ $ekskul['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                                        @elseif (pathinfo($ekskul['video'], PATHINFO_EXTENSION) == 'mp4')
                                            <video src="{{ asset('assets/panel/admin/video/ekskul/' . $ekskul['video']) }}"
                                                class="shadow-sm image-fluid w-100"
                                                style="{{ $ekskul['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;"
                                                {{ $ekskul['status'] == 0 ? '' : 'controls' }}>
                                            </video>
                                        @endif
                                        <div class="py-4">
                                            {{ $ekskul['description'] }}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('ekskul.update', $ekskul['id']) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success">Restore Gambar</button>
                                        </form>
                                        <form action="{{ route('ekskul.destroy', $ekskul['id']) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete Gambar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
                                <label for="image" class="form-label">Foto/Video</label>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="image" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" cols="20" rows="2" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
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
