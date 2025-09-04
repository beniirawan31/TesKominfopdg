@extends('layout.app')

@section('content')
    @include('komponen.notif')

    <!-- Bootstrap & SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="fw-bold text-">Halaman Order</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg border-0" style="border-radius: 0.75rem; overflow: hidden;">
                        {{-- <div class="card-header d-flex justify-content-between align-items-center"
                            style="background: linear-gradient(90deg, #320A6B, #5D3BE8); color: white;">
                            <a href="{{ route('order.create') }}" class="btn btn-light btn-sm"
                                style="border-radius: 20px; font-weight: 500;">
                                <i class="fas fa-plus"></i> Tambah Order
                            </a>
                        </div> --}}

                        <div class="card-body p-3">
                            <table id="example2"
                                class="table table-bordered table-hover text-center align-middle shadow-sm"
                                style="border-radius: 0.5rem; overflow: hidden;">
                                <thead style="background-color: #065084; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Nomor HP</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Order</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: #f9f9f9;">
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        // Pop-up pesan
        document.querySelectorAll('.pesan-pop').forEach(el => {
            el.addEventListener('click', function() {
                Swal.fire({
                    title: 'Pesan Lengkap',
                    text: this.dataset.pesan,
                    icon: 'info',
                    confirmButtonText: 'Tutup'
                });
            });
        });

        // SweetAlert - Hapus
        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const nama = this.dataset.nama;

                Swal.fire({
                    title: 'Hapus Order?',
                    text: `Yakin ingin menghapus order atas nama ${nama}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`form-delete-${id}`).submit();
                    }
                });
            });
        });

        // SweetAlert - Ubah Status
        document.querySelectorAll('.btn-status').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const currentStatus = this.dataset.status;

                Swal.fire({
                    title: 'Ubah Status Order',
                    text: `Ubah status order atas nama "${nama}"`,
                    input: 'select',
                    inputOptions: {
                        'Menunggu': 'Menunggu',
                        'Proses': 'Diproses',
                        'Selesai': 'Selesai',
                        'Dibatalkan': 'Dibatalkan',
                        'Dalam Pengiriman': 'Dalam Pengiriman',
                    },
                    inputValue: currentStatus,
                    showCancelButton: true,
                    confirmButtonText: 'Ubah',
                    cancelButtonText: 'Batal',
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Silakan pilih status baru';
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/order/status/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status_order: result.value
                            })
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire('Berhasil!', 'Status berhasil diperbarui.',
                                        'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Gagal!',
                                    'Terjadi kesalahan saat mengubah status.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
