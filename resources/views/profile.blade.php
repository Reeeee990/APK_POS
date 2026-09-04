@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('layouts.navbar')

    <div class="profile-page">
        <header class="profile-heading">
            <h1>Tentang Saya</h1>
            <p>Profil pengguna aplikasi Lavender Mart</p>
        </header>

        <div class="profile-layout">
            <section class="profile-identity-card">
                <div class="profile-photo" aria-label="Foto profil">
                    <img src="{{ asset('image.png') }}" alt="Foto profil {{ $user->name }}">
                </div>
                <h2>{{ $user->name }}</h2>
                <p class="profile-subtitle">Pengguna Aplikasi</p>
                <span class="profile-role">{{ $user->role?->name ?? 'Pengguna' }}</span>
                <div class="profile-divider"></div>
                <p class="profile-introduction">
                    Selamat datang di halaman profil aplikasi <strong>Lavender Mart</strong>.
                    Kelola kebutuhan toko dan transaksi penjualan cake dengan lebih mudah.
                </p>
            </section>

            <div class="profile-info-stack">
                <section class="profile-info-card">
                    <h2>Informasi Pengguna</h2>
                    <dl class="profile-data-list">
                        <div>
                            <dt>Nama</dt>
                            <dd>{{ $user->name }}</dd>
                        </div>
                        <div>
                            <dt>Email</dt>
                            <dd>{{ $user->email }}</dd>
                        </div>
                        <div>
                            <dt>Peran</dt>
                            <dd>{{ $user->role?->name ?? 'Pengguna' }}</dd>
                        </div>
                        <div>
                            <dt>Bergabung</dt>
                            <dd>{{ $user->created_at?->translatedFormat('d F Y') ?? '-' }}</dd>
                        </div>
                    </dl>
                </section>

                <section class="profile-info-card">
                    <h2>Teknologi yang Digunakan</h2>
                    <ul class="technology-list">
                        <li><strong>Bahasa Pemrograman:</strong> PHP, JavaScript</li>
                        <li><strong>Framework:</strong> Laravel</li>
                        <li><strong>Frontend:</strong> HTML, CSS, Bootstrap</li>
                        <li><strong>Database:</strong> MySQL</li>
                        <li><strong>Tools:</strong> Visual Studio Code, Git</li>
                    </ul>
                </section>
            </div>

            <section class="profile-info-card profile-application-card">
                <h2>Tentang Aplikasi</h2>
                <p><strong>Lavender Mart</strong> merupakan aplikasi Point of Sale (POS) yang dibuat untuk membantu proses pengelolaan toko.</p>
                <p>Aplikasi ini menyediakan beberapa fitur seperti pengelolaan produk, stok, pengguna, kasir, dan transaksi penjualan.</p>
                <p class="mb-0">Dengan adanya aplikasi ini, proses pencatatan produk dan transaksi diharapkan menjadi lebih mudah, teratur, dan efisien.</p>
            </section>
        </div>
    </div>
@endsection