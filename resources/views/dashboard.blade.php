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
                <p class="text-muted mt-2">({{ $tanggalHariIni->format('l, d F Y') }})</p>
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
                            <h4>Total Sales</h4>
                            <small>Today</small>
                            <p class="summary-value mt-3">Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card summary-card p-4 h-100">
                            <h4>Transactions</h4>
                            <small>Total orders</small>
                            <p class="summary-value mt-3">{{ $ringkasan['total_transaksi'] }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card summary-card p-4 h-100">
                            <h4>Cash</h4>
                            <small>Cash payments</small>
                            <p class="summary-value mt-3">Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card summary-card p-4 h-100">
                            <h4>Cashless</h4>
                            <small>Cashless payments</small>
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
                        <h5 class="mb-1">Low Stock Products</h5>
                        <small class="text-muted">Products that are running low</small>
                    </div>
                    <span class="stock-alert stock-alert-warning">
                        <strong>{{ $produkStokRendah->total() }}</strong> products
                    </span>
                </div>
                @if ($produkStokRendah->total() > 0)
                    <div class="stock-notice stock-notice-warning">
                        <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                        <span>{{ $produkStokRendah->total() }} products need to be restocked soon.</span>
                    </div>
                @endif
                <div class="mt-3">{{ $produkStokRendah->links() }}</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card page-panel table-card">
                <div class="section-header mb-3">
                    <div>
                        <h5 class="mb-1">Out of Stock Products</h5>
                        <small class="text-muted">Products with no stock remaining</small>
                    </div>
                    <span class="stock-alert stock-alert-danger">
                        <strong>{{ $produkStokHabis->total() }}</strong> products
                    </span>
                </div>
                @if ($produkStokHabis->total() > 0)
                    <div class="stock-notice stock-notice-danger">
                        <i class="bi bi-x-circle-fill" aria-hidden="true"></i>
                        <span>{{ $produkStokHabis->total() }} products are out of stock and need to be replenished.</span>
                    </div>
                @endif
                <div class="mt-3">{{ $produkStokHabis->links() }}</div>
            </div>
        </div>
    </div>

    <div class="card page-panel table-card">
        <div class="section-header mb-3">
            <div>
                <h5>Best Seller Products</h5>
                <small class="text-muted">Best-selling products this month</small>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Units Sold</th>
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
                            <td colspan="3" class="text-muted text-center">All products are sufficiently stocked.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
