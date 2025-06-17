<!DOCTYPE html>
<html>

<head>
    <title>Nilai Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        hr {
            border: none;
            border-top: 2px solid black;
            margin: 20px 0;
        }

        .signature-section {
            margin-top: 50px;
            text-align: left;
            width: 50%;
            float: right;
        }

        .signature-section p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <h1>Daftar Nilai Siswa</h1>
    <p><strong>Nama Sekolah:</strong> SDN 1 Karangmalang</p>
    <p><strong>Alamat:</strong> Jl. Pasarean No.16, Karangmalang</p>
    <p><strong>Nama Siswa:</strong> {{ $siswa->name }}</p>
    <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
    <p><strong>Kelas:</strong> {{ $siswa->class }}</p>

    <hr>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Mata Pelajaran</th>
                @foreach ($komponenNilai as $komponen)
                    <th>{{ strtoupper($komponen) }}</th>
                @endforeach
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAverage = 0;
                $subjectCount = 0;
            @endphp
            @foreach ($mapels as $index => $mapel)
                @php
                    $totalNilai = 0;
                    $jumlahNilai = 0;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mapel->nama }}</td>
                    @foreach ($komponenNilai as $komponen)
                        @php
                            $kolom = $mapel->kode . '_' . $komponen;
                            $nilai = $siswa->nilai->{$kolom} ?? null;
                            if ($nilai !== null) {
                                $totalNilai += $nilai;
                                $jumlahNilai++;
                            }
                        @endphp
                        <td>{{ $nilai ?? '-' }}</td>
                    @endforeach
                    @php
                        $average = $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : 0;
                        $totalAverage += $average;
                        $subjectCount++;
                    @endphp
                    <td>{{ number_format($average, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="{{ 2 + count($komponenNilai) }}" class="text-center fw-bold">Nilai Rapor</td>
                <td class="fw-bold">{{ $subjectCount > 0 ? number_format($totalAverage / $subjectCount, 2) : '-' }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="signature-section">
        <p>Karangmalang, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</p>
        <p>Wali Kelas</p>
        <br><br><br>
        <p>{{ $waliKelas->name ?? 'Tidak tersedia' }}</p>
        <p>NIP. {{ $waliKelas->nip ?? 'Tidak tersedia' }}</p>
    </div>
</body>

</html>
