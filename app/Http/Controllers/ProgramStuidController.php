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
}
