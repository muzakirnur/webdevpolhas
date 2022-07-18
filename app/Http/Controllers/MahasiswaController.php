<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data = Mahasiswa::findOrFail($id);
        $nilai = Nilai::where('mahasiswa_id', $id)->paginate(10);
        return view('layouts.mahasiswa.show', compact('data', 'nilai'));
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        Mahasiswa::findOrFail($id)->delete();
        return back()->with('success', 'Data Mahasiswa Berhasil dihapus');
    }
}
