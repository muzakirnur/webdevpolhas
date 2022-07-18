@extends('adminlte::page')

@section('content')
    <div class="container p-2">
        <h3>Edit Profile</h3>
        <hr>
        @include('layouts.partials.alerts')
        <form action="{{ route('profile.update', $data->username) }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                @method('PUT')
                <div class="col-md-4 mx-auto">
                    <img src="{{ asset('images/avatars/' . $data->foto) }}" alt="{{ $data->username }}"
                        class="img-fluid rounded-circle mb-3">
                    <x-adminlte-input type="file" name="foto" fgroup-class="mb-3" label="Avatar" />
                    <x-adminlte-button type="submit" theme="primary" label="Submit" />
                </div>
            </div>
        </form>
    </div>
@endsection
