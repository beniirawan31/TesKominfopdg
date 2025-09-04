@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">Tambah Wali Kelas</div>
        <div class="card-body">
            <form action="{{ route('walikelas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Wali Kelas</label>
                    <input type="text" name="nama" class="form-control" required>
                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Pilih Kelas</label>
                    <select name="kelas_id" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('walikelas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
