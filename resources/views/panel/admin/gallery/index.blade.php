@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Gambar</button>
                    <select name="category" id="selectCategory" class="form-select w-25 h-50">
                        <option value="all" selected>Semua</option>
                        <option value="pengumuman">Pengumuman</option>
                        <option value="prestasi">Prestasi</option>
                        @foreach ($ekskul as $item)
                            <option value="{{ $item['title'] }}">{{ $item['title'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="card mt-2 p-3">
            @if ($galleries->isEmpty())
                <h4>Tidak ada gambar</h4>
            @endif
            <div class="row">
                @foreach ($galleries as $j => $gallerie)
                    <div class="col-md-3 rounded overflow-hidden gallerie" data-category="{{ $gallerie['category'] }}">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $j }}">
                            @if (in_array(pathinfo($gallerie['image'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallerie['image']) }}"
                                    alt="Image" class="shadow-sm image-fluid w-100"
                                    style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                            @elseif (pathinfo($gallerie['video'], PATHINFO_EXTENSION) == 'mp4')
                                <video src="{{ asset('assets/panel/admin/video/galleries/' . $gallerie['video']) }}"
                                    class="shadow-sm image-fluid w-100"
                                    style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                                </video>
                            @endif
                        </a>
                        <div class="my-2">
                            <p class="text-capitalize fw-bold mt-3 text-justify" style="text-wrap: wrap">
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $j }}">
                                    {{ $gallerie['title'] }}
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
                                        @if (in_array(pathinfo($gallerie['image'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                            <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallerie['image']) }}"
                                                alt="Image" class="shadow-sm image-fluid w-100"
                                                style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                                        @elseif (pathinfo($gallerie['video'], PATHINFO_EXTENSION) == 'mp4')
                                            <video
                                                src="{{ asset('assets/panel/admin/video/galleries/' . $gallerie['video']) }}"
                                                class="shadow-sm image-fluid w-100"
                                                style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;"
                                                {{ $gallerie['status'] == 0 ? '' : 'controls' }}>
                                            </video>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('galleries.update', $gallerie['id']) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success">Tampilkan Ke Beranda</button>
                                        </form>
                                        <form action="{{ route('galleries.destroy', $gallerie['id']) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus Gambar</button>
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
                <form action="{{ route('galleries.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Gambar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
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
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Kategori</label>
                                    <select name="category" id="selectCategory" class="form-select">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="pengumuman">Pengumuman</option>
                                        @foreach ($ekskul as $item)
                                            <option value="{{ $item['title'] }}">{{ $item['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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

        $(document).ready(() => {
            // Filter cards based on the selected category
            function filterCards(category) {
                $('.gallerie').each(function() {
                    let cardCategory = $(this).data('category');
                    if (category === 'all' || category === cardCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Initial filter based on default selected value
            let category = $('#selectCategory').val();
            filterCards(category);

            // Filter cards when the category changes
            $('#selectCategory').on('change', function() {
                category = $(this).val();
                filterCards(category);
            });
        });
    </script>
@endsection
