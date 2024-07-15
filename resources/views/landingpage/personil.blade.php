@extends('landingpage.app')

@section('content')
    <div class="container-fluid bg-white py-5" id="berita" style="height: 100%">
        <div class="container pb-5">
            <h1 class="display-6 mb-3">Tenaga Pendidik</h1>
            <div class="row">
                @foreach ($personils as $index => $personil)
                    <div class="col-md-3 my-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">{{ $personil->name }}</span>
                                    <span>
                                        @if ($personil->jabatan == 1)
                                            Kepala Sekolah
                                        @elseif ($personil->jabatan == 2)
                                            Guru
                                        @else
                                        Staff
                                        @endif
                                    </span>
                                </div>
                                <hr class="border-dark mx-auto">
                                <img src="{{ asset('assets/panel/admin/images/personil/' . $personil->image) }}"
                                    alt="Image" class="image-fluid text-center w-100">
                                <p class="text-justify">{{ $personil->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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