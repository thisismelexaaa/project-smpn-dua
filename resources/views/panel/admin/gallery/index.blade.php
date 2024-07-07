@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Gambar</button>
                    <select class="form-select col-2" name="" id="">
                        <option value="all">Semua Kategori</option>
                        <option value="personil">Personil</option>
                        <option value="berita">Berita</option>
                        <option value="prestasi">Prestasi</option>
                        <option value="pengumuman">Pengumuman</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="card mt-2">
            <div class="card-body d-flex flex-wrap justify-content-center gap-4">
                @if ($galleries->isEmpty())
                    <h4>Tidak ada gambar</h4>
                @endif
                @foreach ($galleries as $j => $gallerie)
                    <div class="d-flex flex-column border rounded overflow-hidden">
                        <div class="my-auto">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $j }}"
                                class="my-auto">
                                <img src="{{ asset('assets/panel/admin/images/galleries/' . $gallerie['image']) }}"
                                    alt="Image" class="shadow-sm image-fluid" width="200"
                                    style="{{ $gallerie['status'] == 0 ? 'filter: grayscale(100%);' : '' }}">
                            </a>
                        </div>
                        <div class="p-2">
                            @if ($gallerie['category'] == 'pengumuman')
                                <span class="badge text-bg-primary p-2">Pengumuman</span>
                            @elseif ($gallerie['category'] == 'prestasi')
                                <span class="badge text-bg-info p-2">Prestasi</span>
                            @elseif ($gallerie['category'] == 'berita')
                                <span class="badge text-bg-success p-2">Berita</span>
                            @else
                                <span class="badge text-bg-secondary p-2">Personil</span>
                            @endif
                            <div class="text-capitalize fw-bold py-1">{{ $gallerie['title'] }}</div>
                        </div>
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
                                    <form action="{{ route('galleries.destroy', $gallerie['id']) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete Gambar</button>
                                    </form>
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
        $(document).ready(function() {
            $('#formFile').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
