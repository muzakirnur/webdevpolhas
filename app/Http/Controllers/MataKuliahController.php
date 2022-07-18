<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $data = Matakuliah::paginate(10);
        return view('layouts.matakuliah.index', compact('data'));
    }
}
