@extends('adminlte::page')
@section('content')
    <div class="card-header">
        <h5 class="card-title">Tambah Data Matakuliah</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('matkul.save') }}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input name="name" label="Matakuliah" placeholder="Nama Matakuliah" fgroup-class="col-md-6"
                    autofocus value="{{ old('name') }}" />
                <x-adminlte-select name="prodi_id" label="Program Studi" fgroup-class="col-md-6">
                    <option selected>Pilih Program Studi</option>
                    @foreach ($prodi as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </x-adminlte-select>
            </div>
            <x-adminlte-button type="submit" theme="primary" label="submit" />
        </form>
    </div>
@endsection
