<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmincController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Ganti dengan halaman dashboard admin
    }

    public function siswa()
    {
        return view('admin.siswa.index'); // Halaman untuk mengelola data siswa
    }

    public function guru()
    {
        return view('admin.guru.index'); // Halaman untuk mengelola data guru
    }
    
}
