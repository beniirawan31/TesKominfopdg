@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h4>Edit Siswa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $siswa->nisn) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{ old('alamat', $siswa->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Sekolah</label>
                        <input type="text" name="id_sekolah" class="form-control"
                            value="{{ old('id_sekolah', $siswa->id_sekolah) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Kelas</label>
                        <input type="text" name="id_kelas" class="form-control"
                            value="{{ old('id_kelas', $siswa->id_kelas) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Tahun Ajar</label>
                        <input type="text" name="id_th_ajar" class="form-control"
                            value="{{ old('id_th_ajar', $siswa->id_th_ajar) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Mesjid</label>
                        <input type="text" name="id_mesjid" class="form-control"
                            value="{{ old('id_mesjid', $siswa->id_mesjid) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Card</label>
                        <input type="text" name="id_card" class="form-control"
                            value="{{ old('id_card', $siswa->id_card) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
