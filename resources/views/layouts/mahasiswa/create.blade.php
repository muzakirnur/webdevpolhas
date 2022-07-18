         @extends('adminlte::page')
         @section('content')
             <div class="card-header">
                 <h5 class="card-title">Tambah Data Mahasiswa</h5>
             </div>
             <div class="card-body">
                 <form action="{{ route('mahasiswa.store') }}" method="post">
                     @csrf
                     <div class="row">
                         <x-adminlte-input name="nama" label="Nama" placeholder="Nama Mahasiswa" fgroup-class="col-md-6"
                             autofocus value="{{ old('nama') }}" />
                         <x-adminlte-input name="nim" type="number" label="NIM" placeholder="NIM Mahasiswa"
                             fgroup-class="col-md-6" value="{{ old('nim') }}" />
                         <x-adminlte-select name="prodi_id" label="Program Studi" fgroup-class="col-md-6">
                             <option selected>Pilih Program Studi</option>
                             @foreach ($prodi as $row)
                                 <option value="{{ $row->id }}">{{ $row->name }}</option>
                             @endforeach
                         </x-adminlte-select>
                         <x-adminlte-input name="hp" type="number" label="No Handphone" placeholder="Nomer Handphone"
                             fgroup-class="col-md-6" value="{{ old('hp') }}" />
                     </div>
                     <x-adminlte-button type="submit" theme="primary" label="submit" />
                 </form>
             </div>
         @endsection
