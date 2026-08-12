@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('layouts.navbar')

    <div class="page-section">
        <div class="page-panel card mx-auto" style="max-width: 680px;">
            <div class="section-header justify-content-center text-center">
                <div>
                    <h1>Profile</h1>
                    <p class="text-muted">Biodata singkat dan informasi aplikasi.</p>
                </div>
            </div>

            <div class="card p-4 shadow-sm">
                <div class="text-center mb-4">
                    <h4 class="mb-1">{{ $user->name }}</h4>
                    <p class="text-muted mb-0">{{ ucfirst($user->role->name) }}</p>
                </div>

                <div class="row gx-3 gy-3 mb-4">
                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: rgba(125, 110, 245, 0.08);">
                            <small class="text-uppercase text-muted">Bergabung</small>
                            <p class="mb-0">{{ $user->created_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>

                <h5>Tentang Aplikasi</h5>
                <p class="text-muted mb-4">Aplikasi ini membantu mengelola produk, jenis, dan penjualan dengan cepat untuk admin dan kasir. Desainnya ringkas agar mudah digunakan di toko sehari-hari.</p>

                <div>
                    <h6>Media Sosial</h6>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </a>
                        <a href="#" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-globe me-1"></i> Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection