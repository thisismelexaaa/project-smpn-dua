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
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masukan as $masukan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $masukan['name'] }}</td>
                                    <td>{{ $masukan['email'] }}</td>
                                    <td class="w-50">{{ $masukan['message'] }}</td>
                                    <td>{{ $masukan['created_at']->format('d-m-Y') }}</td>
                                    <td>
                                        <form action="{{ route('masukan.destroy', $masukan['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" href="{{ route('masukan.destroy', $masukan['id']) }}"
                                                class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
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
