@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8 p-3">
                <h2>Data Program Studi</h2>
            </div>
            <div class="col-md-4 p-3 text-right">
                <a href="{{ route('prodi.create') }}" class="btn btn-success"><i class="fas fa-fw fa-plus"></i> Tambah
                    Data Program Studi</a>
            </div>
        </div>
        @include('layouts.partials.alerts')
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                    <tr>
                        <th scope="row">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</th>
                        <td>{{ $row->name }}</td>
                        <td>
                            <a href="{{ route('prodi.show', Crypt::encrypt($row->id)) }}" class="btn btn-primary"><i
                                    class="fas fa-fw fa-eye"></i></a>
                            <a href="{{ route('prodi.destroy', Crypt::encrypt($row->id)) }}"
                                class="btn btn-danger delete-confirm"><i class="fas fa-fw fa-trash"></i></a>
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
@push('js')
    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Yakin ingin Menghapus ?',
                text: 'Data Program Studi ini akan di Hapus Permanen',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endpush
