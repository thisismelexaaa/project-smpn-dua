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
                                        <input name="last_name" type="text" class="form-control col-md col-sm-3"
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
                                    <select name="jabatan" class="form-select" id="jabatanPersonil">
                                        <option disabled selected>Pilih Jabatan</option>
                                        <option value="1" {{ $jabatan ? 'hidden' : '' }}>Kepala Sekolah</option>
                                        <option value="2">Guru</option>
                                    </select>
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
                            <div class="mb-3 row" id="sambutanKepalasekolah">
                                <div class="col-md-12 col-sm-12">
                                    <label for="image" class="form-label my-auto pb-1">Sambutan Kepala Sekolah</label>
                                    <textarea class="form-control col" name="sambutan" cols="20" rows="5" id="editor">
                                        {{ $jabatan ? $jabatan['sambutan'] : '' }}
                                    </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-3">
            <div class="card-header">
                <span>Data Kepala Sekolah</span>
            </div>
            <div class="card-body overflow-auto" style="height: 100%">
                <table class="table table-bordered table-hover table-striped">
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
                        @if ($jabatan)
                            <tr>
                                <td class="text-start">1</td>
                                <td>{{ $jabatan['name'] }}</td>
                                <td>{{ $jabatan['email'] }}</td>
                                <td>{{ $jabatan['phone'] }}</td>
                                <td>Kepala Sekolah</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalKepalaSekolah">Edit</button>
                                        <form action="{{ route('personil.destroy', $jabatan['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Tidak Ada Kepala Sekolah</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
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
                            @if ($item['jabatan'] == 2)
                                <tr>
                                    <td class="text-start">{{ $loop->iteration }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}@gmail.com</td>
                                    <td>{{ $item['phone'] }}</td>
                                    <td>Guru</td>
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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($jabatan)
        <div class="modal fade" id="modalKepalaSekolah" tabindex="-1" aria-labelledby="modalEditLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEditLabel">Edit Data Kepala Sekolah</h1>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('personil.update', $jabatan['id']) }}" class="px-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="nama" class="form-label col-md-3">Nama Lengkap</label>
                                <input required name="first_name" type="text"
                                    class="form-control col-md-4 me-1 col-sm-2" placeholder="Nama Depan"
                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                    value="{{ $jabatan['first_name'] }}">
                                <input name="last_name" type="text" class="form-control col-md-4  col-sm-2"
                                    placeholder="Nama Belakang" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" value="{{ $jabatan['last_name'] }}">
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="form-label col-md-3">Email</label>
                                <div class="input-group p-0 col-md-8 col-sm-2">
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2" value="{{ $jabatan['email'] }}">
                                    <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                    <input type="hidden" name="gmail" value="@gmail.com">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="form-label my-auto pb-1 col-md-3">Jabatan</label>
                                <select name="jabatan" class="form-select col-md-8 col-sm-2" id="jabatan">
                                    <option selected value="1">Kepala Sekolah</option>
                                </select>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="form-label col-md-3">Nomor Telepon</label>
                                <input required name="phone" type="number" class="form-control col-md-8 col-sm-2"
                                    placeholder="Nomor Telepon" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" value="{{ $jabatan['phone'] }}">
                            </div>
                            <div class="mb-3 row">
                                <label for="image" class="form-label col-md-3">Foto</label>
                                <input name="image" type="file" class="form-control col-md-8 col-sm-2"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                            </div>
                            <div class="mb-3 row">
                                <label for="image" class="form-label my-auto pb-1 col-md-3">Sambutan Kepala
                                    Sekolah</label>
                                <textarea placeholder="Sambutan Kepala Sekolah" class="form-control col-md-8 col-sm-2" name="sambutan"
                                    cols="20" rows="5" id="editor2">{!! $jabatan['sambutan'] !!}</textarea>
                            </div>
                            <div class="mb-3 row">
                                <label for="image" class="form-label col-md-3">Foto Lama</label>
                                <img class="img-fluid"
                                    style="width: 150px; height: 150px; object-fit: cover; transition: 0.2s ease; cursor: zoom-in;"
                                    src="{{ asset('assets/panel/admin/images/personil/' . $jabatan['image']) }}"
                                    alt="Image of {{ $jabatan['name'] }}"
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
    @endif

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
                                <input name="last_name" type="text" class="form-control col-md-4  col-sm-2"
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
                                <label for="jabatan" class="form-label my-auto pb-1 col-md-3">Jabatan</label>
                                <select name="jabatan" class="form-select col-md-8 col-sm-2" id="jabatan">
                                    <option value="2">Guru</option>
                                </select>
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
            try {
                // Initialize ClassicEditor for #editor
                ClassicEditor
                    .create(document.querySelector('#editor'), {
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                            'blockQuote'
                        ]
                    })
                    .catch(error => {
                        console.error('Error initializing #editor:', error);
                    });
            } catch (error) {
                console.error('Error during ClassicEditor #editor initialization:', error);
            }

            try {
                // Initialize ClassicEditor for #editor2
                ClassicEditor
                    .create(document.querySelector('#editor2'), {
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                            'blockQuote'
                        ]
                    })
                    .catch(error => {
                        console.error('Error initializing #editor2:', error);
                    });
            } catch (error) {
                console.error('Error during ClassicEditor #editor2 initialization:', error);
            }

            try {
                // Initialize DataTable for #dataTable
                $('#dataTable').DataTable({
                    responsive: true
                });
            } catch (error) {
                console.error('Error initializing DataTable:', error);
            }

            // Initially hide the sambutanKepalasekolah section
            $('#sambutanKepalasekolah').hide();

            // Show/hide sambutanKepalasekolah based on jabatanPersonil selection
            $('#jabatanPersonil').on('change', function() {
                let jabatan = $(this).val();
                $('#sambutanKepalasekolah').toggle(jabatan == 1);
            });
        });
    </script>
@endsection
