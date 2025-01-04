<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Walkel;
use App\Models\User;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        $user = Auth::user();
        $totalSiswa = Siswa::count();
        $totalWaliKelas = Walkel::count();

        return view('admin.dashboard', compact('user', 'totalSiswa', 'totalWaliKelas'));
    }

    public function walikelas(Request $request)
    {
        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'asc');

        $validOrderColumns = ['name', 'position', 'id'];
        if (!in_array($orderBy, $validOrderColumns)) {
            $orderBy = 'id';
        }

        $waliKelasList = Walkel::orderBy($orderBy, $orderDirection)->get();
        return view('admin.walikelas.index', compact('waliKelasList', 'orderBy', 'orderDirection'));
    }

    public function showWalikelas($id)
    {
        $waliKelas = Walkel::findOrFail($id);
        return view('admin.walikelas.show', compact('waliKelas'));
    }

    public function createWalikelas()
    {
        return view('admin.walikelas.create');
    }

    public function storeWalikelas(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'education' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'rank' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->name . '@gmail.com',
            'password' => bcrypt($request->name . '123'),
            'role' => 'walikelas',
        ]);

        Walkel::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'nip' => $request->nip,
            'nuptk' => $request->nuptk,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'education' => $request->education,
            'position' => $request->position,
            'rank' => $request->rank,
        ]);

        return redirect()->route('admin.walikelas.index')->with('success', 'Wali Kelas berhasil ditambahkan.');
    }

    public function editWalikelas($id)
    {
        $waliKelas = Walkel::findOrFail($id);
        return view('admin.walikelas.edit', compact('waliKelas'));
    }

    public function updateWalikelas(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'education' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'rank' => 'required|string',
        ]);

        $waliKelas = Walkel::findOrFail($id);
        $waliKelas->update($request->only('name', 'nip', 'nuptk', 'place_of_birth', 'date_of_birth', 'education', 'position', 'rank'));

        return redirect()->route('admin.walikelas.show', $waliKelas->id)->with('success', 'Data berhasil diperbarui!');
    }

    public function destroyWalikelas($id)
    {
        $waliKelas = Walkel::findOrFail($id);
        $user = $waliKelas->user;

        $waliKelas->delete();

        if ($user) {
            $user->delete();
        }

        return redirect()->route('admin.walikelas.index')->with('success', 'Data wali kelas dan user yang terhubung berhasil dihapus.');
    }

    public function siswa(Request $request)
    {
        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'asc');

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

                    $subjectAverage = $totalScore / 7;
                    $totalAverage += $subjectAverage;
                }

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
            }, SORT_REGULAR, $orderDirection === 'asc')
            ->values();

        return view('admin.siswa.index', compact('siswas', 'orderBy', 'orderDirection'));
    }

    public function showSiswa($id)
    {
        $siswa = Siswa::with('nilai')->findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    public function createSiswa()
    {
        return view('admin.siswa.create');
    }

    public function storeSiswa(Request $request)
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->name . '@gmail.com',
            'password' => bcrypt($request->name . '123'),
            'role' => 'siswa',
        ]);

        Siswa::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'class' => $request->class,
            'nisn' => $request->nisn,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function editSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function updateSiswa(Request $request, $id)
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

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->only('name', 'class', 'nisn', 'place_of_birth', 'date_of_birth', 'gender', 'religion', 'address', 'phone'));

        return redirect()->route('admin.siswa.show', $siswa->id)->with('success', 'Data berhasil diperbarui!');
    }

    public function destroySiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $user = $siswa->user;

        $siswa->delete();

        if ($user) {
            $user->delete();
        }

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa dan user yang terhubung berhasil dihapus.');
    }

    public function nilaiSiswa($id)
    {
        $siswa = Siswa::with('nilai')->findOrFail($id);
        return view('admin.siswa.nilai', compact('siswa'));
    }

    public function storeNilaiSiswa(Request $request, $id)
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

        return redirect()->route('admin.siswa.index')->with('success', 'Nilai berhasil disimpan');
    }
}
