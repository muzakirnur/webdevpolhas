@extends('adminlte::page')

@section('content')
    <section class="content mt-3">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $prodi }}</h3>

                        <p>Program Studi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-university"></i>
                    </div>
                    <a href="{{ route('prodi.index') }}" class="small-box-footer text-dark">Lihat <i
                            class="fa fa-eye"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $mahasiswa }}</h3>

                        <p>Mahasiswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-users"></i>
                    </div>
                    <a href="{{ route('mahasiswa.index') }}" class="small-box-footer text-dark">Lihat <i
                            class="fas fa-fw fa-eye"></i></a>
                </div>
            </div>

            <!-- ./col -->

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $matakuliah }}</h3>

                        <p>Matakuliah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-book"></i>
                    </div>
                    <a href="{{ route('matkul.index') }}" class="small-box-footer text-dark">Lihat <i
                            class="fas fa-fw fa-eye"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $nilai }}</h3>

                        <p>Nilai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-chart-bar"></i>
                    </div>
                    <a href="{{ route('nilai.index') }}" class="small-box-footer text-dark">Lihat <i
                            class="fas fa-fw fa-eye"></i></a>
                </div>
            </div>
        </div>

    </section>
@endsection
