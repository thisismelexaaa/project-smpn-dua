@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive dataTable table">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengirim</th>
                                <th>Email</th>
                                <th>Pesan</th>
                                <th>Rating</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masukan as $masukan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $masukan['name'] }}</td>
                                    <td style="width: 10%">{{ $masukan['email'] }}</td>
                                    <td style="width: 40%">{{ $masukan['message'] }}</td>
                                    <td>
                                        @if ($masukan['rating'] == null || $masukan['rating'] == 0)
                                            Tidak Memberi Rating
                                        @endif
                                        @for ($i = 0; $i < $masukan['rating']; $i++)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @endfor
                                    </td>
                                    <td>{{ $masukan['created_at']->translatedFormat('l, j F Y') }}</td>
                                    <td>{{ $masukan['status'] == 0 ? 'Disembunyikan' : 'Ditampilkan' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('masukan.update', $masukan['id']) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                @if ($masukan['status'] == 0)
                                                    <button type="submit" class="btn btn-primary btn-sm">Show</button>
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm">Hide</button>
                                                @endif
                                            </form>
                                            <form action="{{ route('masukan.destroy', $masukan['id']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="{{ route('masukan.destroy', $masukan['id']) }}"
                                                    class="btn btn-danger btn-sm">Delete</button>
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
    </div>
@endsection
