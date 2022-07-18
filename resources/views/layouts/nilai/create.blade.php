@extends('adminlte::page')
@section('content')
    <div class="card-header">
        <h5 class="card-title">Tambah Data Nilai</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('nilai.save') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="mahasiswa">Mahasiswa</label>
                    <select name="mahasiswa_id" id="mahasiswa" class="form-control">
                        <option selected>Pilih Mahasiswa</option>
                        @foreach ($mahasiswa as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Matakuliah">Matakuliah</label>
                    <select name="matakuliah_id" id="matakuliah_id" class="form-control">
                        <option selected>Pilih Mahasiswa Terlebih Dahulu</option>
                    </select>
                </div>
                <x-adminlte-input name="nilai" id="nilai" fgroup-class="col-md-4 mb-3" label="Nilai" type="number"
                    placeholder="10 - 100" />
            </div>
            <x-adminlte-button type="submit" theme="primary" label="submit" />
        </form>
    </div>
@endsection
@push('js')
    <script>
        $('#mahasiswa').change(function() {
            var mahasiswa = $(this).val();
            if (mahasiswa) {
                $.ajax({
                    type: "GET",
                    url: "/admin/" + mahasiswa + "/matakuliah",
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            $("#matakuliah_id").empty();
                            $("#matakuliah_id").append('<option>---Pilih Matakuliah---</option>');
                            $.each(res, function(id, nama) {
                                $("#matakuliah_id").append('<option value="' + id + '">' +
                                    nama +
                                    '</option>');
                            });
                        } else {
                            $("#matakuliah_id").empty();
                        }
                    }
                });
            } else {
                $("#matakuliah_id").empty();
            }
        });
    </script>
@endpush
