<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use App\Models\Prodi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prodi = Prodi::all()->count();
        $mahasiswa = Mahasiswa::all()->count();
        $matakuliah = Matakuliah::all()->count();
        $nilai = Nilai::all()->count();
        $page = "Dashboard";
        return view('home', compact('page', 'prodi', 'mahasiswa', 'matakuliah', 'nilai'));
    }
}
