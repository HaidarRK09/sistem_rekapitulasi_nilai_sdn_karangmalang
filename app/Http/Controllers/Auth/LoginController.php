<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial dan opsi "Remember Me"
        if (Auth::attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->has('remember') // Periksa apakah "remember me" dicentang
        )) {
            $user = Auth::user();

            // Cek apakah akun pengguna aktif
            if (!$user->is_active) {
                Auth::logout();
                return redirect('/login')->withErrors(['email' => 'Your account is inactive. Please contact support.']);
            }

            // Cek apakah email sudah diverifikasi
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return redirect('/login')->withErrors(['email' => 'Please verify your email address.']);
            }

            // Redirect berdasarkan role
            return $this->redirectBasedOnRole($user);
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    // Redirect berdasarkan role pengguna
    private function redirectBasedOnRole($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->intended('/admin/dashboard')->with('status', 'Welcome back, Admin!');
            case 'teacher':
                return redirect()->intended('/teacher/dashboard')->with('status', 'Welcome back, Teacher!');
            case 'siswa':
                return redirect()->intended('/siswa/dashboard')->with('status', 'Welcome back, Student!');
            default:
                Auth::logout();
                return redirect('/login')->withErrors(['email' => 'Role tidak valid.']);
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('status', 'You have been logged out.');
    }

    // Menampilkan pesan untuk flash message di view
    public function showFlashMessage()
    {
        return view('auth.login')->with('status', session('status'));
    }
}
