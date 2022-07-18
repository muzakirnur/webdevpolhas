@extends('adminlte::page')
@section('content')
    <div class="card-header">
        <h5 class="card-title">Tambah Data Nilai</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('nilai.save') }}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-select name="matakuliah_id" label="Matakuliah" fgroup-class="col-md-6">
                    <option selected>Pilih Mahasiswa</option>
                    @foreach ($mahasiswa as $row)
                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-input name="hp" type="number" label="No Handphone" placeholder="Nomer Handphone"
                    fgroup-class="col-md-6" value="{{ old('hp') }}" />
            </div>
            <x-adminlte-button type="submit" theme="primary" label="submit" />
        </form>
    </div>
@endsection
