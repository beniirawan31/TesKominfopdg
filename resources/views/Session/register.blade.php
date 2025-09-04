@extends('layouts.app')

@section('content')
    <h2>Form Register</h2>

    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('registerproses') }}" method="POST">
        @csrf
        <label>Nama</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password</label><br>
        <input type="password" name="password"><br><br>

        <label>Konfirmasi Password</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
@endsection
