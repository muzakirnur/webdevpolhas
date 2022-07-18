<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

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
}