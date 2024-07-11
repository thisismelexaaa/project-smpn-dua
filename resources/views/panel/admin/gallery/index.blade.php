@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Gambar</button>
                    <select name="category" id="selectCategory" class="form-select col-2">
                        <option value="all">Semua Kategori</option>
                        <option value="prestasi">Prestasi</option>
                        <option value="pengumuman">Pengumuman</option>
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
                            <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallerie['image']) }}"
                                alt="Image" class="shadow-sm image-fluid w-100"
                                style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover;">
                        </a>
                        <div class="my-2">
                            @if ($gallerie['category'] == 'pengumuman')
                                <span class="badge text-bg-primary p-2">Pengumuman</span>
                            @elseif ($gallerie['category'] == 'prestasi')
                                <span class="badge text-bg-info p-2">Prestasi</span>
                            @elseif ($gallerie['category'] == 'berita')
                                <span class="badge text-bg-success p-2">Berita</span>
                            @endif
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
                                    <div class="modal-body">
                                        <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallerie['image']) }}"
                                            alt="Image" class="w-100 rounded-lg">
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('galleries.update', $gallerie['id']) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success">Restore Gambar</button>
                                        </form>
                                        <form action="{{ route('galleries.destroy', $gallerie['id']) }}" method="POST">
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
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Judul">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Pilih Gambar</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Category</label>
                                    <select type="text" placeholder="" class="form-select js-states" id="category"
                                        name="category">
                                        <option disabled selected>Category</option>
                                        <option value="pengumuman">Pengumuman</option>
                                        <option value="prestasi">Prestasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid rounded" id="preview" src="https://via.placeholder.com/200"
                                alt="">
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
