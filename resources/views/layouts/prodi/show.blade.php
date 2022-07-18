@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8 p-3">
                <h2>Data Matakuliah di Program Studi {{ $data->name }}</h2>
            </div>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Matakuliah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matakuliah as $row)
                    <tr>
                        <th scope="row">
                            {{ ($matakuliah->currentPage() - 1) * $matakuliah->perPage() + $loop->iteration }}</th>
                        <td>{{ $row->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Data Kosong
                        </td>
                    </tr>
                @endforelse
        </table>
        <div class="row">
            <div class="col-md-8">
                {{ $matakuliah->links() }}
            </div>
            <div class="col-md-4 text-right">
                <button onclick="history.back(-1)" class="btn btn-light shadow-sm"><i class="fas fa-fw fa-arrow-left"></i>
                    Kembali</button>
            </div>
        </div>
    </div>
@endsection
