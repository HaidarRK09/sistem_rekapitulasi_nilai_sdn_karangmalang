@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Mata Pelajaran</h2>
        <form action="{{ url('/admin/mapel') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Mata Pelajaran</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="
