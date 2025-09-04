@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Siswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Sekolah</label>
                    <input type="text" name="id_sekolah" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Kelas</label>
                    <input type="text" name="id_kelas" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Tahun Ajar</label>
                    <input type="text" name="id_th_ajar" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Mesjid</label>
                    <input type="text" name="id_mesjid" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Card</label>
                    <input type="text" name="id_card" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
