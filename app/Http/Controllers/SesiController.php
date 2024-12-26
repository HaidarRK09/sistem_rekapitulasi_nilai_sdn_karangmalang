<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan Auth diimpor

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        // Validasi input email dan password
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Data login yang diterima dari form
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Cek apakah kredensial valid
        if (Auth::attempt($infologin)) {
            if(Auth::user()->role =='siswa') {
                return redirect('admin/siswa');
            } elseif (Auth::user()->role=='wali_kelas'){
                return redirect('admin/walikelas/siswa');
            // } elseif (Auth::user()->role=='guru'){
            //     return redirect('admin/guru');
            } elseif (Auth::user()->role=='admin'){
                return redirect('/admin');
            }
            
        } else {
            // Jika login gagal, kembali ke form dengan pesan error
            return redirect('')->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
