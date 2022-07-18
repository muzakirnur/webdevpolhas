<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProgramStuidController extends Controller
{
    public function index()
    {
        $data = Prodi::paginate(10);
        return view('layouts.prodi.index', compact('data'));
    }

    public function create()
    {
        return view('layouts.prodi.create');
    }

    public function save(Request $request)
    {
        Prodi::create([
            'name' => $request->name
        ]);

        return redirect()->route('prodi.index')->with('success', 'Data Program Studi Berhasil ditambahkan');
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data = Prodi::findOrFail($id);
        $matakuliah = Matakuliah::where('prodi_id', $id)->paginate(10);
        return view('layouts.prodi.show', compact('data', 'matakuliah'));
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        Prodi::find($id)->delete();
        return back()->with('success', 'Program Srudi Berhasil di Hapus');
    }
}
