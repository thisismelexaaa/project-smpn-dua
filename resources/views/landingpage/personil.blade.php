@extends('landingpage.app')

@section('content')
    <div class="container-fluid bg-white py-5" id="berita" style="height: 100%">
        <div class="container pb-5">
            <h1 class="display-6 mb-3">Tenaga Pendidik</h1>
            <table class="table dataTable table-hover table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-start">#</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personils as $index => $personil)
                        <tr>
                            <td class="text-start">{{ $loop->iteration }}</td>
                            <td>{{ $personil->name }}</td>
                            <td>{{ $personil->jabatan == 2 ? 'Guru' : 'Kepala Sekolah' }}</td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalFoto{{ $index }}"><i class="bi bi-card-image"></i></button>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalFoto{{ $index }}" tabindex="-1"
                            aria-labelledby="modalFoto{{ $index }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalFoto{{ $index }}Label">Foto
                                            {{ $personil->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('assets/panel/admin/images/personil/' . $personil->image) }}"
                                            class="img-fluid">
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-white"
                                            data-bs-dismiss="modal">Close</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/panel/vendor/datatables/dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
