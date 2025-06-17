<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Walkel;
use App\Models\Mapel;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'asc');

        $user = Auth::user(); // Gunakan Auth::user() untuk konsistensi
        $mapels = Mapel::all(); // agar tidak undefined
        $subjects = $mapels->pluck('kode')->toArray();

        if ($user->role == 'admin') {
            $siswas = Siswa::with('nilai')
                ->orderBy($orderBy, $orderDirection)
                ->get()
                ->map(function ($siswa) use ($subjects) {
                    $totalAverage = 0;
                    $totalSubjects = count($subjects);

                    foreach ($subjects as $subject) {
                        $totalScore = 0;
                        $subjectTasks = ['tugas1', 'tugas2', 'tugas3', 'tugas4', 'tugas5', 'uts', 'uas'];
                        foreach ($subjectTasks as $task) {
                            $totalScore += $siswa->nilai->sum($subject . '_' . $task);
                        }
                        $subjectAverage = $totalScore / count($subjectTasks);
                        $totalAverage += $subjectAverage;
                    }

                    $siswa->average = $totalSubjects > 0 ? $totalAverage / $totalSubjects : 0;
                    return $siswa;
                })
                ->sortBy(function ($siswa) use ($orderBy) {
                    if ($orderBy === 'name') return strtolower($siswa->name);
                    if ($orderBy === 'class') {
                        preg_match('/(\d+)([A-Za-z]+)/', $siswa->class, $matches);
                        return [(int)($matches[1] ?? 0), $matches[2] ?? ''];
                    }
                    if ($orderBy === 'average') return $siswa->average;
                    return strtolower($siswa->name);
                }, SORT_REGULAR, $orderDirection === 'asc')
                ->values();

            $siswa = null;
            $nilais = collect();
        } else {
            $siswas = collect();
            $siswa = Siswa::where('user_id', $user->id)->with('nilai')->first();
            $nilais = $siswa ? $siswa->nilai : collect();
        }

        return view('siswa.index', compact('siswas', 'siswa', 'nilais', 'orderBy', 'orderDirection', 'mapels'));
    }

    public function editProfile()
    {
        $siswa = Auth::user()->siswa;
        return view('siswa.profile', compact('siswa'));
    }

    public function updateProfile(Request $request)
    {
        $siswa = Auth::user()->siswa;
        $siswa->update($request->all());
        return redirect()->route('siswa.profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function showPrint()
    {
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->with('nilai')->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        $waliKelas = Walkel::where('position', 'Wali ' . $siswa->class)->first();

        $mapels = Mapel::all();
        $komponenNilai = ['tugas1', 'tugas2', 'tugas3', 'tugas4', 'tugas5', 'uts', 'uas'];

        return view('siswa.print', compact('siswa', 'waliKelas', 'mapels', 'komponenNilai'));
    }

    public function nilai($id)
    {
        $siswa = Siswa::with('nilai')->findOrFail($id);
        $mapels = Mapel::all();

        return view('admin.siswa.nilai', compact('siswa', 'mapels'));
    }
}
