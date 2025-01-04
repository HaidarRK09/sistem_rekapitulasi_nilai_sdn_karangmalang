<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Nilai;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'asc');

        $user = auth()->user();

        if ($user->role == 'admin') {
            $siswas = Siswa::with('nilai')
            ->orderBy($orderBy, $orderDirection)
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

            // Define $siswa and $nilais as empty for admin
            $siswa = null;
            $nilais = collect();
        } else {
            $siswas = collect(); // Empty collection for non-admin
            $siswa = Siswa::where('user_id', $user->id)->first();
            $nilais = $siswa ? $siswa->nilai : collect();
        }

        return view('siswa.index', compact('siswas', 'siswa', 'nilais', 'orderBy', 'orderDirection'));
    }

    public function editProfile()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profile', compact('siswa'));
    }

    public function updateProfile(Request $request)
    {
        $siswa = auth()->user()->siswa;
        $siswa->update($request->all());
        return redirect()->route('siswa.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
