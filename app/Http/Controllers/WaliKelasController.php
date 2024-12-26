<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index()
    {
        $siswas = Siswa::where('walikelas_id', auth()->id())->get();
        return view('walikelas.index', compact('siswas'));
    }

    public function show($id)
    {
        $siswa = Siswa::with('nilai')->findOrFail($id);
        return view('walikelas.show', compact('siswa'));
    }

    public function create()
    {
        return view('walikelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        $siswa = Siswa::create([
            'name' => $request->name,
            'class' => $request->class,
            'walikelas_id' => auth()->id(),
        ]);

        return redirect()->route('walikelas.index');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('walikelas.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->only('name', 'class'));

        return redirect()->route('walikelas.index');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('walikelas.index');
    }

    public function nilai($id)
    {
        $siswa = Siswa::with('nilai')->findOrFail($id);
        return view('walikelas.nilai', compact('siswa'));
    }

    public function storeNilai(Request $request, $id)
    {
        $request->validate([
            'tugas1' => 'nullable|numeric|min:0|max:100',
            'tugas2' => 'nullable|numeric|min:0|max:100',
            'uts' => 'nullable|numeric|min:0|max:100',
            'uas' => 'nullable|numeric|min:0|max:100',
        ]);

        $siswa = Siswa::findOrFail($id);

        $nilai = Nilai::updateOrCreate(
            ['siswa_id' => $siswa->id],
            [   'tugas1' => $request->tugas1,
                'tugas2' => $request->tugas2,
                'uts' => $request->uts,
                'uas' => $request->uas,
            ]
        );

        return redirect()->route('walikelas.index');
    }
}
