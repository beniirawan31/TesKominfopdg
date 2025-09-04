@extends('layout.app')

@section('content')
    @include('komponen.notif')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>Daftar Wali Kelas</h3>
            <a href="{{ route('walikelas.create') }}" class="btn btn-success">+ Tambah Wali Kelas</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Wali Kelas</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($walikelas as $index => $wali)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $wali->nama }}</td>
                        <td>{{ $wali->kelas->nama }}</td>
                        <td>
                            <a href="{{ route('walikelas.edit', $wali->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('walikelas.destroy', $wali->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada data wali kelas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
