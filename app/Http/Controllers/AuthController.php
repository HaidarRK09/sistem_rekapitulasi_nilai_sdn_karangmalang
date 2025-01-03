<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Proses login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect berdasarkan role
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'wali_kelas') {
                return redirect()->route('wali_kelas.dashboard');
            } elseif ($user->role == 'siswa') {
                return redirect()->route('siswa.dashboard');
            }
        }

        // Jika login gagal
        return redirect()->route('login')->with('error', 'Email atau password salah.');
    }
}

