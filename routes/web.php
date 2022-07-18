<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProfileController;
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

    // Routes Kelola Profile
    Route::get('profile/{username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{username}', [ProfileController::class, 'update'])->name('profile.update');

    // Routes Mendapatkan Matakuliah Berdasarkan Selected Mahasiswa
    Route::get('{id}/matakuliah', [NilaiController::class, 'getMatkul']);

    // Routes Kelola Mahasiswa
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('mahasiswa', [MahasiswaController::class, 'save'])->name('mahasiswa.save');

    // Routes Kelola Program Studi
    Route::get('program-studi', [ProgramStuidController::class, 'index'])->name('prodi.index');
    Route::get('program-studi/create', [ProgramStuidController::class, 'create'])->name('prodi.create');
    Route::post('program-studi/create', [ProgramStuidController::class, 'save'])->name('prodi.save');

    // Routes Kelola Matakuliah
    Route::get('matakuliah', [MataKuliahController::class, 'index'])->name('matkul.index');
    Route::get('matakuliah/create', [MataKuliahController::class, 'create'])->name('matkul.create');
    Route::post('matakuliah/create', [MataKuliahController::class, 'save'])->name('matkul.save');

    // Routes Kelola Data Nilai
    Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
    Route::get('nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('nilai/create', [NilaiController::class, 'save'])->name('nilai.save');
});
