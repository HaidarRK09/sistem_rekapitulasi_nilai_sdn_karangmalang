@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Nilai Siswa</h1>
    <div class="container mt-5">
        <p style="font-size: 1.5rem;">Nama: {{ $siswa->name }}</p>
        <p style="font-size: 1.5rem; margin-bottom: 30px;">Kelas: {{ $siswa->class }}</p>
        <form action="{{ route('walikelas.storeNilai', $siswa->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tugas1" class="form-label">Tugas 1</label>
                <input type="number" name="tugas1" id="tugas1" class="form-control"
                    value="{{ $siswa->nilai->tugas1 ?? '' }}" min="0" max="100" step="any">
            </div>
            <div class="mb-3">
                <label for="tugas2" class="form-label">Tugas 2</label>
                <input type="number" name="tugas2" id="tugas2" class="form-control"
                    value="{{ $siswa->nilai->tugas2 ?? '' }}" min="0" max="100" step="any">
            </div>
            <div class="mb-3">
                <label for="tugas3" class="form-label">Tugas 3</label>
                <input type="number" name="tugas3" id="tugas3" class="form-control"
                    value="{{ $siswa->nilai->tugas3 ?? '' }}" min="0" max="100" step="any">
            </div>
            <div class="mb-3">
                <label for="tugas4" class="form-label">Tugas 4</label>
                <input type="number" name="tugas4" id="tugas4" class="form-control"
                    value="{{ $siswa->nilai->tugas4 ?? '' }}" min="0" max="100" step="any">
            </div>
            <div class="mb-3">
                <label for="tugas5" class="form-label">Tugas 5</label>
                <input type="number" name="tugas5" id="tugas5" class="form-control"
                    value="{{ $siswa->nilai->tugas5 ?? '' }}" min="0" max="100" step="any">
            </div>
            <div class="mb-3">
                <label for="uts" class="form-label">UTS</label>
                <input type="number" name="uts" id="uts" class="form-control"
                    value="{{ $siswa->nilai->uts ?? '' }}" min="0" max="100" step="any">
            </div>
            <div class="mb-3">
                <label for="uas" class="form-label">UAS</label>
                <input type="number" name="uas" id="uas" class="form-control"
                    value="{{ $siswa->nilai->uas ?? '' }}" min="0" max="100" step="any">
            </div>
            <a href="{{ route('walikelas.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>
@endsection
