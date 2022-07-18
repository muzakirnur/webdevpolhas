<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($username)
    {
        $data = User::where('username', $username)->first();
        return view('layouts.profile.index', compact('data'));
    }

    public function update($username, Request $request)
    {
        $data = User::where('username', $username)->first();

        if ($request->hasFile('foto')) {
            $validated = $request->validate([
                'foto' => ['image', 'max:1024'],
            ]);
            $nm = $validated['foto'];
            $name = $nm->getClientOriginalName();
            $request->foto->move(public_path('images/avatars'), $name);
            $data->update([
                'foto' => $name
            ]);
        }
        return back()->with('success', 'Profile Berhasil diPerbarui');
    }
}
