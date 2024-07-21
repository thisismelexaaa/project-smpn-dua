@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Sarana &
                        Prasarana</button>
                    {{-- <select name="category" id="selectCategory" class="form-select w-25 h-50">
                        <option value="all" selected>Semua</option>
                        <option value="sarana">Sarana</option>
                        <option value="prasarana">Prasarana</option>
                    </select> --}}
                </div>
            </div>
        </div>

        <div class="card mt-2 p-3">
            @if ($sarana->isEmpty())
                <h4>Tidak ada Sarana & Prasarana</h4>
            @endif
            <div class="row">
                @foreach ($sarana as $j => $sarana)
                    <div class="col-md-3 rounded overflow-hidden gallerie" data-category="{{ $sarana['category'] }}">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $j }}">
                            <img src="{{ asset('assets/panel/admin/images/sarana-prasarana/' . $sarana['image']) }}"
                                alt="Image" class="shadow-sm image-fluid w-100"
                                style="{{ $sarana['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                        </a>
                        <div class="my-2">
                            <p class="text-capitalize fw-bold mt-3 text-justify" style="text-wrap: wrap">
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $j }}">
                                    {{ $sarana['name'] }}
                                </a>
                            </p>
                        </div>

                        <div class="modal fade" id="exampleModal{{ $j }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $sarana['name'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('assets/panel/admin/images/sarana-prasarana/' . $sarana['image']) }}"
                                            alt="Image" class="shadow-sm image-fluid w-100"
                                            style="{{ $sarana['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('sarana-prasarana.update', $sarana['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success">Restore Media</button>
                                        </form>
                                        <form action="{{ route('sarana-prasarana.destroy', $sarana['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete Media</button>
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('sarana-prasarana.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sarana Prasarana</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Judul">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Foto / Video</label>
                                    <input class="form-control" type="file" id="formFile" name="file">
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Kategori</label>
                                    <select name="category" id="selectCategory" class="form-select">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="pengumuman">Pengumuman</option>
                                        <option value="prestasi">Prestasi</option>
                                        <option value="kegiatan">Kegiatan</option>
                                        <option value="pensi">Pensi</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="d-flex justify-content-center" id="preview-container">
                            <img class="img-fluid rounded" id="preview-image" src="https://via.placeholder.com/200"
                                alt="">
                            <video class="img-fluid rounded" id="preview-video" style="display: none;" controls></video>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
