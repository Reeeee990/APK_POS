
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    body{
        min-height:100vh;
        background: linear-gradient(135deg,#8488B5,#DEDEEA);
    }

    .login-card{ 
        border:0;
        border-radius:1rem;
    }

    .login-card .form-control{
        padding:.75rem 1rem;
    }

    .login-card .btn-primary{
        padding:.75rem;
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-6 col-lg-4">

            <div class="card login-card shadow-lg">

                <div class="card-body p-4">

                    <h2 class="fw-bold text-center mb-1">
                        Login POS
                    </h2>

                    <p class="text-center text-muted mb-4">
                        Silakan login untuk melanjutkan
                    </p>

                    <form action="{{ route('auth') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection
