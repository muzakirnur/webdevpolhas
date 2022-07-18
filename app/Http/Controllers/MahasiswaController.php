<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::with('prodi')->paginate(10);
        return view('layouts.mahasiswa.index', compact('data'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('layouts.mahasiswa.create', compact('prodi'));
    }

    public function save(Request $request)
    {
        $validate = $request->validate([
            'nama' => ['required'],
            'nim' => ['required', 'digits:9'],
            'prodi_id' => ['required'],
            'hp' => ['required', 'digits_between:12,13'],
        ]);

        Mahasiswa::create($validate);
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil ditambahkan');
    }
}
