<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // Mengecek apakah pengguna sudah terautentikasi
        if (Auth::guard($guard)->check()) {
            // Jika sudah terautentikasi, alihkan ke halaman yang diinginkan
            return redirect('/home'); // Ubah '/home' sesuai dengan rute yang Anda inginkan
        }

        return $next($request);
    }
}
