@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8 p-3">
                <h2>Data Penilaian {{ $data->nama }}</h2>
            </div>
            <div class="col-md-4 p-3 text-right">
                <button onclick="history.back(-1)" class="btn btn-light shadow-sm"><i class="fas fa-fw fa-arrow-left"></i>
                    Kembali</button>
            </div>
        </div>
        @include('layouts.partials.alerts')
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Matakuliah</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Grade</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nilai as $row)
                    <tr>
                        <th scope="row">{{ ($nilai->currentPage() - 1) * $nilai->perPage() + $loop->iteration }}</th>
                        <td>{{ $row->matakuliah->name }}</td>
                        <td>{{ $row->nilai }}</td>
                        <td>{{ $row->grade }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Data Kosong
                        </td>
                    </tr>
                @endforelse
        </table>
        {{ $nilai->links() }}
    </div>
@endsection
