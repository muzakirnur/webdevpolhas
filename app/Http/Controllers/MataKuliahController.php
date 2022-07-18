<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MataKuliahController extends Controller
{
    public function index()
    {
        $data = Matakuliah::paginate(10);
        return view('layouts.matakuliah.index', compact('data'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('layouts.matakuliah.create', compact('prodi'));
    }

    public function save(Request $request)
    {
        Matakuliah::create([
            'name' => $request->name,
            'prodi_id' => $request->prodi_id,
        ]);
        return redirect()->route('matkul.index')->with('success', 'Data Berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        Matakuliah::find($id)->delete();
        return back()->with('success', 'Data Matakuliah Berhasil dihapus');
    }
}
