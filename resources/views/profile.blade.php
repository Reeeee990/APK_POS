@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('layouts.navbar')

    <div class="page-section">
        <div class="page-panel card profile-panel mx-auto">
            <div class="section-header">
                <div>
                    <h1>Biodata Saya</h1>
                    <p class="text-muted mb-0">Informasi akun dan identitas pengguna.</p>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-identity">
                    <div class="profile-photo" aria-label="Tempat foto profil">
                        <img
                            src="{{ asset('image.png') }}"
                            alt="Foto profil">
                    </div>
                    <div>
                        <h2>Nama Lengkap Anda</h2>
                        <span class="profile-role">Role Anda</span>
                    </div>
                </div>

                <div class="profile-details">
                    <div class="profile-detail">
                        <small>Email</small>
                        <strong>email@contoh.com</strong>
                    </div>
                    <div class="profile-detail">
                        <small>Bergabung</small>
                        <strong>DD Bulan YYYY</strong>
                    </div>
                    <div class="profile-detail">
                        <small>Nomor Telepon</small>
                        <strong class="profile-placeholder">Tulis nomor telepon Anda</strong>
                    </div>
                    <div class="profile-detail">
                        <small>Alamat</small>
                        <strong class="profile-placeholder">Tulis alamat Anda</strong>
                    </div>
                </div>

                <div class="profile-note">
                    <h5>Tentang Saya</h5>
                    <p class="mb-0">Tulis deskripsi singkat tentang diri Anda di sini.</p>
                </div>
            </div>
        </div>
    </div>
@endsection