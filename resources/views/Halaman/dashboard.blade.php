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
                    <h1 class="fw-bold text-">Dashboard </h1>
                </div>
            </div>
        </div>
    </section>

    
@endsection
