@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    @include('layouts.navbar')

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <span class="badge-soft">Dashboard</span>
                <h1 class="mt-3">Good Evening, {{ auth()->user()->name ?? 'Shambhavi' }}</h1>
                <p class="mb-0">You can manage your whole team and sales performance from here.</p>
                <p class="text-muted mt-2">({{ $tanggalHariIni->translatedFormat('l, d F Y') }})</p>
            </div>
            <div class="col-md-4 text-md-end mt-4 mt-md-0">
                <input type="search" class="form-control" placeholder="Search here..." disabled>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="card page-panel p-4 dashboard-summary-wrapper">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="card summary-card p-4 h-100">
                            <h4>Total Penjualan</h4>
                            <small>Hari ini</small>
                            <p class="summary-value mt-3">Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card summary-card p-4 h-100">
                            <h4>Transaksi</h4>
                            <small>Jumlah order</small>
                            <p class="summary-value mt-3">{{ $ringkasan['total_transaksi'] }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card summary-card p-4 h-100">
                            <h4>Cash</h4>
                            <small>Pembayaran tunai</small>
                            <p class="summary-value mt-3">Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card summary-card p-4 h-100">
                            <h4>Non-Tunai</h4>
                            <small>Pembayaran non-tunai</small>
                            <p class="summary-value mt-3">Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card page-panel table-card">
                <div class="section-header mb-3">
                    <div>
                        <h5>Produk Rendah</h5>
                        <small class="text-muted">Stok kritis</small>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkStokRendah as $index => $produk)
                                <tr>
                                    <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center">Semua produk dalam stok aman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $produkStokRendah->links() }}</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card page-panel table-card">
                <div class="section-header mb-3">
                    <div>
                        <h5>Produk Habis Stok</h5>
                        <small class="text-muted">Butuh restock</small>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkStokHabis as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center">Semua produk dalam stok aman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $produkStokHabis->links() }}</div>
            </div>
        </div>
    </div>

    <div class="card page-panel table-card">
        <div class="section-header mb-3">
            <div>
                <h5>Best Seller Products</h5>
                <small class="text-muted">Produk terlaris bulan ini</small>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Unit Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkTerlaris as $produk)
                        <tr>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->total_terjual }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Semua produk dalam stok aman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
