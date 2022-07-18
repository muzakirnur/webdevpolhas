<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use App\Services\INilaiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NilaiController extends Controller
{
    protected $nilaiService;
    public function __construct(INilaiService $nilaiService)
    {
        $this->nilaiService = $nilaiService;
    }

    public function index()
    {
        $data = Nilai::paginate(10);
        return view('layouts.nilai.index', compact('data'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('layouts.nilai.create', compact('mahasiswa'));
    }

    public function save(Request $request)
    {
        $validate = $request->validate([
            'nilai' => ['required', 'integer', 'between:10,100']
        ]);
        $this->nilaiService->add([
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'nilai' => $validate['nilai'],
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai Berhasil ditambahkan');
    }

    public function getMatkul($id)
    {
        $getProdi = Mahasiswa::findOrFail($id);
        $getProdi = $getProdi->prodi_id;
        $getMatkul = Matakuliah::where('prodi_id', $getProdi)->pluck('name', 'id');
        return json_encode($getMatkul);
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        Nilai::findOrFail($id)->delete();
        return back()->with('success', 'Data Nilai Berhasil dihapus');
    }
}
