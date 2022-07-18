@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8 p-3">
                <h2>Data Penilaian Mahasiswa</h2>
            </div>
            <div class="col-md-4 p-3">
                <a href="{{ route('nilai.create') }}" class="btn btn-success"><i class="fas fa-fw fa-plus"></i> Tambah
                    Data Nilai</a>
            </div>
        </div>
        @include('layouts.partials.alerts')
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Matakuliah</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                    <tr>
                        <th scope="row">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</th>
                        <td>{{ $row->mahasiswa->nama }}</td>
                        <td>{{ $row->mahasiswa->hp }}</td>
                        <td>{{ $row->mahasiswa->prodi->name }}</td>
                        <td>{{ $row->matakuliah->name }}</td>
                        <td>{{ $row->nilai }}</td>
                        <td>{{ $row->grade }}</td>
                        <td>
                            <button class="btn btn-primary"><i class="fas fa-fw fa-eye"></i></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Data Kosong
                        </td>
                    </tr>
                @endforelse
        </table>
        {{ $data->links() }}
    </div>
@endsection
