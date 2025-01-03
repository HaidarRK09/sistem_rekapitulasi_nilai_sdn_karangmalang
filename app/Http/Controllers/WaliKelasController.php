<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'desc');

        $siswas = Siswa::with('nilai')
            ->get()
            ->map(function ($siswa) {
                $subjects = [
                    'agama',
                    'pancasila',
                    'indonesia',
                    'matematika',
                    'pjok',
                    'sbk',
                    'inggris',
                    'muatanlokal'
                ];
                $totalAverage = 0;
                $totalSubjects = count($subjects);
                foreach ($subjects as $subject) {
                    $totalScore = 0;
                    $subjectTasks = ['tugas1', 'tugas2', 'tugas3', 'tugas4', 'tugas5', 'uts', 'uas'];

                    foreach ($subjectTasks as $task) {
                        $totalScore += $siswa->nilai->sum($subject . '_' . $task);
                    }

                    $subjectAverage = $totalScore / 7;  // Rata-rata per mata pelajaran
                    $totalAverage += $subjectAverage;  // Tambahkan rata-rata setiap mata pelajaran
                }

                // Rata-rata keseluruhan
                $siswa->average = $totalAverage / $totalSubjects;
                return $siswa;
            })
            ->sortBy(function ($siswa) use ($orderBy) {
                if ($orderBy === 'name') {
                    return strtolower($siswa->name);
                }

                if ($orderBy === 'class') {
                    preg_match('/(\d+)([A-Za-z]+)/', $siswa->class, $matches);
                    return [(int)$matches[1], $matches[2]];
                }

                if ($orderBy === 'average') {
                    return $siswa->average;
                }

                return strtolower($siswa->name);
            }, SORT_REGULAR, $orderDirection === 'desc')
            ->values();

        return view('walikelas.index', compact('siswas', 'orderBy', 'orderDirection'));
    }

    // public function index()
    // {
    //     $siswas = Siswa::where('walikelas_id', auth()->id())->get();
    //     return view('walikelas.index', compact('siswas'));
    // }

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
            'nisn' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:255',
        ]);

        $siswa = Siswa::create([
            'name' => $request->name,
            'class' => $request->class,
            'nisn' => $request->nisn,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'phone' => $request->phone,
            'walikelas_id' => auth()->id(),
        ]);

        return redirect()->route('walikelas.index')->with('success', 'Siswa berhasil ditambahkan');
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
            'nilai.*.tugas1' => 'nullable|numeric|min:0|max:100',
            'nilai.*.tugas2' => 'nullable|numeric|min:0|max:100',
            'nilai.*.tugas3' => 'nullable|numeric|min:0|max:100',
            'nilai.*.tugas4' => 'nullable|numeric|min:0|max:100',
            'nilai.*.tugas5' => 'nullable|numeric|min:0|max:100',
            'nilai.*.uts' => 'nullable|numeric|min:0|max:100',
            'nilai.*.uas' => 'nullable|numeric|min:0|max:100',
        ]);

        $siswa = Siswa::findOrFail($id);

        foreach ($request->nilai as $subject => $scores) {
            $nilai = Nilai::updateOrCreate(
                ['siswa_id' => $siswa->id],
                [
                    "{$subject}_tugas1" => $scores['tugas1'] ?? null,
                    "{$subject}_tugas2" => $scores['tugas2'] ?? null,
                    "{$subject}_tugas3" => $scores['tugas3'] ?? null,
                    "{$subject}_tugas4" => $scores['tugas4'] ?? null,
                    "{$subject}_tugas5" => $scores['tugas5'] ?? null,
                    "{$subject}_uts" => $scores['uts'] ?? null,
                    "{$subject}_uas" => $scores['uas'] ?? null,
                ]
            );
        }

        return redirect()->route('walikelas.index')->with('success', 'Nilai berhasil disimpan');
    }
}
