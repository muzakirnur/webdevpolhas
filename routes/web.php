<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProgramStuidController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('home');

    // Routes Kelola Mahasiswa
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('mahasiswa', [MahasiswaController::class, 'save'])->name('mahasiswa.store');

    // Routes Kelola Program Studi
    Route::get('program-studi', [ProgramStuidController::class, 'index'])->name('prodi.index');

    // Routes Kelola Matakuliah
    Route::get('matakuliah', [MataKuliahController::class, 'index'])->name('matkul.index');

    // Routes Kelola Data Nilai
    Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
});
