<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $data = Nilai::paginate(10);
        return view('layouts.nilai.index', compact('data'));
    }
}
