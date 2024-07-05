@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-4">
        <div class="accordion accordion-flush mb-4 border shadow-sm" style="border-radius: 1%" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Tambah Data Personil
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form action="{{ route('personil.store') }}" class="mx-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama" class="form-label my-auto pb-1">Nama
                                        Lengkap</label>
                                    <div class="d-flex gap-1">
                                        <input required name="first_name" type="text"
                                            class="form-control col-md col-sm-3" placeholder="Nama Depan"
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <input required name="last_name" type="text" class="form-control col-md col-sm-3"
                                            placeholder="Nama Belakang" aria-label="Recipient's username"
                                            aria-describedby="button-addon2">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="email" class="form-label my-auto pb-1">Email</label>
                                    <div class="input-group col p-0">
                                        <input type="text" class="form-control col-md col-sm-3" name="email"
                                            placeholder="Email" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                        <input type="hidden" name="gmail" value="@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 col-sm-12">
                                    <label for="jabatan" class="form-label my-auto pb-1">Jabatan</label>
                                    <input required name="jabatan" type="text" class="form-control col"
                                        placeholder="Jabatan" aria-label="Recipient's username"
                                        aria-describedby="button-addon2">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="phone" class="form-label my-auto pb-1">Nomor Telepon</label>
                                    <input required name="phone" type="number" class="form-control col"
                                        placeholder="Nomor Telepon" aria-label="Recipient's username"
                                        aria-describedby="button-addon2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="image" class="form-label my-auto pb-1">Foto</label>
                                    <input required name="image" type="file" class="form-control col"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <span>Data Personil</span>
            </div>
            <div class="card-body overflow-auto" style="height: 100%">
                <table class="table table-bordered dataTable table-hover table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-start">#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['phone'] }}</td>
                                <td>{{ $item['jabatan'] }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $item['id'] }}">Edit</button>
                                        <form action="{{ route('personil.destroy', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($data as $item)
        <div class="modal fade" id="modalEdit{{ $item['id'] }}" tabindex="-1" aria-labelledby="modalEditLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEditLabel">Edit Data Personil</h1>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('personil.update', $item['id']) }}" class="px-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="nama" class="form-label col-md-3">Nama Lengkap</label>
                                <input required name="first_name" type="text"
                                    class="form-control col-md-4 me-1 col-sm-2" placeholder="Nama Depan"
                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                    value="{{ $item['first_name'] }}">
                                <input required name="last_name" type="text" class="form-control col-md-4  col-sm-2"
                                    placeholder="Nama Belakang" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" value="{{ $item['last_name'] }}">
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="form-label col-md-3">Email</label>
                                <div class="input-group p-0 col-md-8 col-sm-2">
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2" value="{{ $item['email'] }}">
                                    <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                    <input type="hidden" name="gmail" value="@gmail.com">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="form-label col-md-3">Jabatan</label>
                                <input required name="jabatan" type="text" class="form-control col-md-8 col-sm-2"
                                    placeholder="Jabatan" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" value="{{ $item['jabatan'] }}">
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="form-label col-md-3">Nomor Telepon</label>
                                <input required name="phone" type="number" class="form-control col-md-8 col-sm-2"
                                    placeholder="Nomor Telepon" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" value="{{ $item['phone'] }}">
                            </div>
                            <div class="mb-3 row">
                                <label for="image" class="form-label col-md-3">Foto</label>
                                <input name="image" type="file" class="form-control col-md-8 col-sm-2"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                            </div>
                            <div class="mb-3 row">
                                <label for="image" class="form-label col-md-3">Foto Lama</label>
                                <img class="img-fluid"
                                    style="width: 150px; height: 150px; object-fit: cover; transition: 0.2s ease; cursor: zoom-in;"
                                    src="{{ asset('assets/panel/admin/images/personil/' . $item['image']) }}"
                                    alt="Image of {{ $item['name'] }}"
                                    onMouseOver="this.style.width='250px';this.style.height='250px';"
                                    onMouseOut="this.style.width='150px';this.style.height='150px'">
                            </div>
                            <div class="row gap-2">
                                <button type="submit" class="btn btn-primary btn-sm col-2">Submit</button>
                                <button type="button" class="btn btn-secondary btn-sm col-2"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
