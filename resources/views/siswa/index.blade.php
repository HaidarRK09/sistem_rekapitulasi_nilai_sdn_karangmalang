@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Halo, {{ Auth::user()->name }}</h1>
        @if ($siswa)
            <h2 style="font-size: 1.5rem;">Nilai Semester</h2>
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Mata Pelajaran</th>
                        <th>Tugas 1</th>
                        <th>Tugas 2</th>
                        <th>Tugas 3</th>
                        <th>Tugas 4</th>
                        <th>Tugas 5</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Rata-rata Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 1;
                        $totalAverage = 0;
                        $subjectCount = 0;
                    @endphp
                    @foreach ($nilais as $nilai)
                        @php
                            $subjects = [
                                'Agama' => ['agama_tugas1', 'agama_tugas2', 'agama_tugas3', 'agama_tugas4', 'agama_tugas5', 'agama_uts', 'agama_uas'],
                                'Pancasila' => ['pancasila_tugas1', 'pancasila_tugas2', 'pancasila_tugas3', 'pancasila_tugas4', 'pancasila_tugas5', 'pancasila_uts', 'pancasila_uas'],
                                'Indonesia' => ['indonesia_tugas1', 'indonesia_tugas2', 'indonesia_tugas3', 'indonesia_tugas4', 'indonesia_tugas5', 'indonesia_uts', 'indonesia_uas'],
                                'Matematika' => ['matematika_tugas1', 'matematika_tugas2', 'matematika_tugas3', 'matematika_tugas4', 'matematika_tugas5', 'matematika_uts', 'matematika_uas'],
                                'PJOK' => ['pjok_tugas1', 'pjok_tugas2', 'pjok_tugas3', 'pjok_tugas4', 'pjok_tugas5', 'pjok_uts', 'pjok_uas'],
                                'SBK' => ['sbk_tugas1', 'sbk_tugas2', 'sbk_tugas3', 'sbk_tugas4', 'sbk_tugas5', 'sbk_uts', 'sbk_uas'],
                                'Inggris' => ['inggris_tugas1', 'inggris_tugas2', 'inggris_tugas3', 'inggris_tugas4', 'inggris_tugas5', 'inggris_uts', 'inggris_uas'],
                                'Muatan Lokal' => ['muatanlokal_tugas1', 'muatanlokal_tugas2', 'muatanlokal_tugas3', 'muatanlokal_tugas4', 'muatanlokal_tugas5', 'muatanlokal_uts', 'muatanlokal_uas'],
                            ];
                        @endphp
                        @foreach ($subjects as $subject => $fields)
                            @php
                                $total = array_sum(array_map(fn($field) => $nilai->$field, $fields));
                                $average = $total / count($fields);
                                $totalAverage += $average;
                                $subjectCount++;
                            @endphp
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $subject }}</td>
                                <td>{{ $nilai->{$fields[0]} }}</td>
                                <td>{{ $nilai->{$fields[1]} }}</td>
                                <td>{{ $nilai->{$fields[2]} }}</td>
                                <td>{{ $nilai->{$fields[3]} }}</td>
                                <td>{{ $nilai->{$fields[4]} }}</td>
                                <td>{{ $nilai->{$fields[5]} }}</td>
                                <td>{{ $nilai->{$fields[6]} }}</td>
                                <td>{{ number_format($average, 2) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-secondary">
                        <td colspan="9" class="text-end fw-bold text-center">Nilai Rapor</td>
                        <td class="fw-bold">{{ number_format($totalAverage / $subjectCount, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
            <a href="{{ route('siswa.print') }}" class="btn btn-primary mb-3">Print Nilai</a>
        @else
            <p class="text-center">Data nilai tidak ditemukan.</p>
        @endif
    </div>
@endsection
