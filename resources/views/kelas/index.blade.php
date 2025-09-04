@extends('layout.app')

@section('content')

@include('komponen.notif')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4>Daftar Kelas</h4>
                <a href="{{ route('kelas.create') }}" class="btn btn-success btn-sm">+ Tambah Kelas</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>
                                    <a href="{{ route('kelas.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('kelas.destroy', $row->id) }}" method="POST"
                                        class="d-inline form-hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-hapus"
                                            data-nama="{{ $row->nama }}">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Belum ada data kelas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.form-hapus').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // cegah submit langsung
                const nama = this.querySelector('.btn-hapus').dataset.nama;

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: `Data kelas "${nama}" akan dihapus permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); // submit form jika user konfirmasi
                    }
                });
            });
        });
    </script>
@endsection
