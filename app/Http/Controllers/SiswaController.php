<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $siswa = Siswa::where('user_id', $user->id)->first();
        $nilais = $siswa ? $siswa->nilai : collect();

        return view('siswa.index', compact('siswa', 'nilais'));
    }

    public function editProfile()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profile', compact('siswa'));
    }

    public function updateProfile(Request $request)
    {
        $siswa = auth()->user()->siswa;
        $siswa->update($request->all());
        return redirect()->route('siswa.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
