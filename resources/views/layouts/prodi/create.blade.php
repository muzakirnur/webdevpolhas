@extends('adminlte::page')
@section('content')
    <div class="card-header">
        <h5 class="card-title">Tambah Data Program Studi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('prodi.save') }}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input name="name" label="Program Studi" placeholder="Nama Program Studi" fgroup-class="col-md-6"
                    autofocus value="{{ old('name') }}" />
            </div>
            <x-adminlte-button type="submit" theme="primary" label="submit" />
        </form>
    </div>
@endsection
