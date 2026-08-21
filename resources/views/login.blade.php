
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="login-page">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-4">
            <div class="card login-card shadow-lg">
                <div class="card-body">
                    <div class="login-hero">
                        <h2 class="fw-bold">Lavender Mart</h2>
                        <p>Masukkan email dan password untuk mengakses dashboard POS.</p>
                    </div>

                    <form action="{{ route('auth') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
