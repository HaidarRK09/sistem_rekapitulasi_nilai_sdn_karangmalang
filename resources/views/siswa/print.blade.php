<!DOCTYPE html>
<html>
<head>
    <title>Nilai Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Nilai Siswa</h1>
    <p>Nama: {{ $siswa->name }}</p>
    <p>Kelas: {{ $siswa->class }}</p>
    <p>NISN: {{ $siswa->nisn }}</p>
    <table>
        <thead>
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
                <th>Rata-Rata Nilai</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAverage = 0;
                $subjectCount = 0;
                $subjectNames = [
                    'agama' => 'Agama',
                    'pancasila' => 'Pancasila',
                    'indonesia' => 'Bahasa Indonesia',
                    'matematika' => 'Matematika',
                    'pjok' => 'PJOK',
                    'sbk' => 'SBK',
                    'inggris' => 'Bahasa Inggris',
                    'muatanlokal' => 'Muatan Lokal'
                ];
            @endphp
            @foreach ($subjects as $index => $subject)
                @php
                    $nilai = $siswa->nilai->first();
                    $nilai_subject = collect([
                        $nilai->{$subject . '_tugas1'} ?? null,
                        $nilai->{$subject . '_tugas2'} ?? null,
                        $nilai->{$subject . '_tugas3'} ?? null,
                        $nilai->{$subject . '_tugas4'} ?? null,
                        $nilai->{$subject . '_tugas5'} ?? null,
                        $nilai->{$subject . '_uts'} ?? null,
                        $nilai->{$subject . '_uas'} ?? null
                    ]);
                    $total = $nilai_subject->filter()->sum();
                    $average = $nilai_subject->filter()->count() > 0 ? $total / $nilai_subject->filter()->count() : 0;
                    $totalAverage += $average;
                    $subjectCount++;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $subjectNames[$subject] }}</td>
                    <td>{{ $nilai->{$subject . '_tugas1'} ?? '-' }}</td>
                    <td>{{ $nilai->{$subject . '_tugas2'} ?? '-' }}</td>
                    <td>{{ $nilai->{$subject . '_tugas3'} ?? '-' }}</td>
                    <td>{{ $nilai->{$subject . '_tugas4'} ?? '-' }}</td>
                    <td>{{ $nilai->{$subject . '_tugas5'} ?? '-' }}</td>
                    <td>{{ $nilai->{$subject . '_uts'} ?? '-' }}</td>
                    <td>{{ $nilai->{$subject . '_uas'} ?? '-' }}</td>
                    <td>{{ number_format($average, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9" class="text-end fw-bold text-center">Nilai Rapor</td>
                <td class="fw-bold">{{ number_format($totalAverage / $subjectCount, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>