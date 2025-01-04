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
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1; @endphp
                    @foreach ($nilais as $nilai)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>Agama</td>
                            <td>{{ $nilai->agama_tugas1 }}</td>
                            <td>{{ $nilai->agama_tugas2 }}</td>
                            <td>{{ $nilai->agama_tugas3 }}</td>
                            <td>{{ $nilai->agama_tugas4 }}</td>
                            <td>{{ $nilai->agama_tugas5 }}</td>
                            <td>{{ $nilai->agama_uts }}</td>
                            <td>{{ $nilai->agama_uas }}</td>
                        </tr>
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>Pancasila</td>
                            <td>{{ $nilai->pancasila_tugas1 }}</td>
                            <td>{{ $nilai->pancasila_tugas2 }}</td>
                            <td>{{ $nilai->pancasila_tugas3 }}</td>
                            <td>{{ $nilai->pancasila_tugas4 }}</td>
                            <td>{{ $nilai->pancasila_tugas5 }}</td>
                            <td>{{ $nilai->pancasila_uts }}</td>
                            <td>{{ $nilai->pancasila_uas }}</td>
                        </tr>
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>Indonesia</td>
                            <td>{{ $nilai->indonesia_tugas1 }}</td>
                            <td>{{ $nilai->indonesia_tugas2 }}</td>
                            <td>{{ $nilai->indonesia_tugas3 }}</td>
                            <td>{{ $nilai->indonesia_tugas4 }}</td>
                            <td>{{ $nilai->indonesia_tugas5 }}</td>
                            <td>{{ $nilai->indonesia_uts }}</td>
                            <td>{{ $nilai->indonesia_uas }}</td>
                        </tr>
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>Matematika</td>
                            <td>{{ $nilai->matematika_tugas1 }}</td>
                            <td>{{ $nilai->matematika_tugas2 }}</td>
                            <td>{{ $nilai->matematika_tugas3 }}</td>
                            <td>{{ $nilai->matematika_tugas4 }}</td>
                            <td>{{ $nilai->matematika_tugas5 }}</td>
                            <td>{{ $nilai->matematika_uts }}</td>
                            <td>{{ $nilai->matematika_uas }}</td>
                        </tr>
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>PJOK</td>
                            <td>{{ $nilai->pjok_tugas1 }}</td>
                            <td>{{ $nilai->pjok_tugas2 }}</td>
                            <td>{{ $nilai->pjok_tugas3 }}</td>
                            <td>{{ $nilai->pjok_tugas4 }}</td>
                            <td>{{ $nilai->pjok_tugas5 }}</td>
                            <td>{{ $nilai->pjok_uts }}</td>
                            <td>{{ $nilai->pjok_uas }}</td>
                        </tr>
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>SBK</td>
                            <td>{{ $nilai->sbk_tugas1 }}</td>
                            <td>{{ $nilai->sbk_tugas2 }}</td>
                            <td>{{ $nilai->sbk_tugas3 }}</td>
                            <td>{{ $nilai->sbk_tugas4 }}</td>
                            <td>{{ $nilai->sbk_tugas5 }}</td>
                            <td>{{ $nilai->sbk_uts }}</td>
                            <td>{{ $nilai->sbk_uas }}</td>
                        </tr>
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>Inggris</td>
                            <td>{{ $nilai->inggris_tugas1 }}</td>
                            <td>{{ $nilai->inggris_tugas2 }}</td>
                            <td>{{ $nilai->inggris_tugas3 }}</td>
                            <td>{{ $nilai->inggris_tugas4 }}</td>
                            <td>{{ $nilai->inggris_tugas5 }}</td>
                            <td>{{ $nilai->inggris_uts }}</td>
                            <td>{{ $nilai->inggris_uas }}</td>
                        </tr>
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>Muatan Lokal</td>
                            <td>{{ $nilai->muatanlokal_tugas1 }}</td>
                            <td>{{ $nilai->muatanlokal_tugas2 }}</td>
                            <td>{{ $nilai->muatanlokal_tugas3 }}</td>
                            <td>{{ $nilai->muatanlokal_tugas4 }}</td>
                            <td>{{ $nilai->muatanlokal_tugas5 }}</td>
                            <td>{{ $nilai->muatanlokal_uts }}</td>
                            <td>{{ $nilai->muatanlokal_uas }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Data nilai tidak ditemukan.</p>
        @endif
    </div>
@endsection
