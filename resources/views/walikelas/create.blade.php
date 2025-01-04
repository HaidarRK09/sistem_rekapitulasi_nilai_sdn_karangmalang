@extends('walikelas.layouts')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow rounded-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Siswa</h1>
        <form action="{{ route('walikelas.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <!-- Nama Siswa -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Nama Siswa</label>
                    <input type="text" name="name" id="name" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                </div>
                
                <!-- Kelas -->
                <div class="mb-4">
                    <label for="class" class="block text-gray-700 font-medium">Kelas</label>
                    <input type="text" name="class" id="class" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                </div>
                
                <!-- NISN -->
                <div class="mb-4">
                    <label for="nisn" class="block text-gray-700 font-medium">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-4">
                    <label for="place_of_birth" class="block text-gray-700 font-medium">Tempat Lahir</label>
                    <input type="text" name="place_of_birth" id="place_of_birth" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label for="date_of_birth" class="block text-gray-700 font-medium">Tanggal Lahir</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label for="gender" class="block text-gray-700 font-medium">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Agama -->
                <div class="mb-4">
                    <label for="religion" class="block text-gray-700 font-medium">Agama</label>
                    <select name="religion" id="religion" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                        <option value="khonghucu">Khonghucu</option>
                        <option value="tidak memiliki agama">Tidak Memiliki Agama</option>
                    </select>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium">Alamat</label>
                    <textarea name="address" id="address" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required></textarea>
                </div>

                <!-- Nomor Telepon Orang Tua -->
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-medium">Nomor Telepon Orang Tua / Wali</label>
                    <input type="text" name="phone" id="phone" class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex justify-start space-x-4">
                    <a href="{{ route('walikelas.index') }}" class="btn btn-danger p-3 bg-red-500 text-white rounded-lg hover:bg-red-600">Kembali</a>
                    <button type="submit" class="btn btn-primary p-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
