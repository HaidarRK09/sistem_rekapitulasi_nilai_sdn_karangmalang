@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Nilai Siswa</h1>
    <div class="container mt-5">
        <p style="font-size: 1.5rem;">Nama: {{ $siswa->name }}</p>
        <p style="font-size: 1.5rem; margin-bottom: 30px;">Kelas: {{ $siswa->class }}</p>

        <form action="{{ route('walikelas.storeNilai', $siswa->id) }}" method="POST" id="nilaiForm">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mapel</th>
                        <th>Tugas 1</th>
                        <th>Tugas 2</th>
                        <th>Tugas 3</th>
                        <th>Tugas 4</th>
                        <th>Tugas 5</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
            'agama' => 'Pendidikan Agama',
            'pancasila' => 'Pendidikan Pancasila',
            'indonesia' => 'Bahasa Indonesia',
            'matematika' => 'Matematika',
            'pjok' => 'Pendidikan Jasmani',
            'sbk' => 'Seni Budaya',
            'inggris' => 'Bahasa Inggris',
            'muatanlokal' => 'Muatan Lokal',
        ] as $key => $label)
                        @php
                            $nilai = $siswa->nilai->first();
                            $rataRata = $nilai
                                ? ($nilai->{$key . '_tugas1'} +
                                        $nilai->{$key . '_tugas2'} +
                                        $nilai->{$key . '_tugas3'} +
                                        $nilai->{$key . '_tugas4'} +
                                        $nilai->{$key . '_tugas5'} +
                                        $nilai->{$key . '_uts'} +
                                        $nilai->{$key . '_uas'}) /
                                    7
                                : 0;
                        @endphp
                        <tr>
                            <td>{{ $label }}</td>
                            @foreach (range(1, 5) as $i)
                                <td><input type="number" step="0.01"
                                        name="nilai[{{ $key }}][tugas{{ $i }}]" class="form-control"
                                        value="{{ $nilai->{$key . '_tugas' . $i} ?? '' }}" min="0" max="100"
                                        oninput="calculateAverage('{{ $key }}')">
                                </td>
                            @endforeach
                            <td><input type="number" step="0.01" name="nilai[{{ $key }}][uts]"
                                    class="form-control" value="{{ $nilai->{$key . '_uts'} ?? '' }}" min="0"
                                    max="100" oninput="calculateAverage('{{ $key }}')"></td>
                            <td><input type="number" step="0.01" name="nilai[{{ $key }}][uas]"
                                    class="form-control" value="{{ $nilai->{$key . '_uas'} ?? '' }}" min="0"
                                    max="100" oninput="calculateAverage('{{ $key }}')"></td>
                            <td><input type="text" class="form-control" id="average_{{ $key }}"
                                    value="{{ number_format($rataRata, 2) }}" readonly></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('walikelas.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>

    <script>
        function calculateAverage(subject) {
            let totalScore = 0;
            let tasks = ['tugas1', 'tugas2', 'tugas3', 'tugas4', 'tugas5', 'uts', 'uas'];
            tasks.forEach(task => {
                let score = parseFloat(document.querySelector(`input[name="nilai[${subject}][${task}]"]`).value) ||
                    0;
                totalScore += score;
            });
            let average = totalScore / tasks.length;
            document.getElementById(`average_${subject}`).value = average.toFixed(2);
        }
    </script>
@endsection
