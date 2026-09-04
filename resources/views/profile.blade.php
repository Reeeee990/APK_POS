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
                    <img src="{{ asset('image.png') }}" alt="Foto profil {{ $profile['name'] }}">
                </div>
                <h2>Rezalka Aisha Firjatillah</h2>
                <p class="profile-subtitle">Pengguna Aplikasi</p>
                <span class="profile-role">Pemilik Aplikasi</span>
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
                            <dd>Rezalka Aisha Firjatillah</dd>
                        </div>
                        <div>
                            <dt>Instagram</dt>
                            <dd>@Ruuu</dd>
                        </div>
                        <div>
                            <dt>Peran</dt>
                            <dd>Pemilik Aplikasi</dd>
                        </div>
                        <div>
                            <dt>Bergabung</dt>
                            <dd>29 Agustus 2026</dd>
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
                <h2>Tentang Lavender Mart</h2>
                <p><strong>Lavender Mart</strong> adalah aplikasi kasir digital yang dirancang untuk membantu mengelola operasional toko dengan lebih praktis.</p>
                <p>Melalui aplikasi ini, pengelolaan produk, kategori, stok, pengguna, serta transaksi penjualan dapat dilakukan dalam satu tempat.</p>
                <p class="mb-0">Lavender Mart membantu pencatatan menjadi lebih rapi, memudahkan pemantauan persediaan, dan membuat proses penjualan berjalan lebih cepat serta efisien.</p>
            </section>
        </div>
    </div>
@endsection