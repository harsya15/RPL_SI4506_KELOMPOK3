@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="row">
    <div>
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login') }}" method="POST">
             @csrf
            <label for="email" class="fw-bold">email</label>
            <input type="email" id="email" class="form-control mb-3" name="email" placeholder="email" required>
            <label for="pass" class="fw-bold">Password</label>
            <input type="password" id="pass" class="form-control mb-3" name="password" placeholder="Password" required>
            <input type="checkbox" id="remember" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember me</label>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-5 w-100">Login</button>
            </div>
        </form>
        <div class="mt-3 text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></div>
    </div>
</div>
@endsection