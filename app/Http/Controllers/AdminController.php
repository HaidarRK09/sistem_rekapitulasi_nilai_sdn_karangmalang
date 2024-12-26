<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru; // Pastikan model Guru ada
use App\Models\Siswa; // Pastikan model Siswa ada
use App\Models\WaliKelas; // Pastikan model WaliKelas ada
use App\Models\Mapel; // Pastikan model Mapel ada

class AdminController extends Controller
{
    // Halaman utama untuk Admin
    public function index()
    {
        return view('admin.index', ['name' => Auth::user()->name]);
    }

    // Halaman untuk Wali Kelas
    public function walikelas()
    {
        $walikelas = WaliKelas::all(); // Ambil semua data wali kelas
        return view('admin.walikelas.index', ['walikelas' => $walikelas, 'name' => Auth::user()->name]);
    }

    // Halaman untuk Siswa
    public function siswa()
    {
        $siswas = Siswa::all(); // Ambil semua data siswa
        return view('admin.siswa.index', ['siswas' => $siswas, 'name' => Auth::user()->name]);
    }

    // Halaman untuk Guru
    public function guru()
    {
        $gurus = Guru::all(); // Ambil semua data guru
        return view('admin.guru.index', ['gurus' => $gurus, 'name' => Auth::user()->name]);
    }

    // Halaman untuk Mata Pelajaran
    public function mapel()
    {
        $mapels = Mapel::all(); // Ambil semua data mata pelajaran
        return view('admin.mapel.index', ['mapels' => $mapels, 'name' => Auth::user()->name]);
    }

    // Menampilkan form untuk menambahkan guru
    public function createGuru()
    {
        return view('admin.guru.create');
    }

    // Menyimpan data guru yang baru
    public function storeGuru(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:gurus',
            'password' => 'required|string|min:8',
        ]);

        Guru::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan!');
    }

    // Menampilkan form untuk menambahkan siswa
    public function createSiswa()
    {
        return view('admin.siswa.create');
    }

    // Menyimpan data siswa yang baru
    public function storeSiswa(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:siswas',
            'kelas' => 'required|string',
        ]);

        Siswa::create([
            'name' => $validated['name'],
            'nisn' => $validated['nisn'],
            'kelas' => $validated['kelas'],
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    // Menampilkan form untuk menambahkan wali kelas
    public function createWaliKelas()
    {
        return view('admin.walikelas.create');
    }

    // Menyimpan data wali kelas yang baru
    public function storeWaliKelas(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'kelas' => 'required|string',
        ]);

        WaliKelas::create([
            'name' => $validated['name'],
            'kelas' => $validated['kelas'],
        ]);

        return redirect()->route('admin.walikelas.index')->with('success', 'Wali Kelas berhasil ditambahkan!');
    }

    // Menampilkan form untuk menambahkan mata pelajaran
    public function createMapel()
    {
        return view('admin.mapel.create');
    }

    // Menyimpan data mata pelajaran yang baru
    public function storeMapel(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'kode_mapel' => 'required|string|max:255|unique:mapels',
        ]);

        Mapel::create([
            'name' => $validated['name'],
            'kode_mapel' => $validated['kode_mapel'],
        ]);

        return redirect()->route('admin.mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan!');
    }
}
