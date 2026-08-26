@extends('layouts.app')

@section('title', 'Point of Sale')

@section('content')
    @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif

    <div class="page-section pos-page">
        <div class="user-form-panel card pos-panel">
            <div class="user-form-heading">
                <div>
                    <span class="badge-soft"><i class="bi bi-receipt-cutoff" aria-hidden="true"></i> Point of sale</span>
                    <h1 class="mt-3 mb-1">{{ $mode == 'edit' ? 'Edit sale' : 'Add sale' }}</h1>
                    <p class="text-muted mb-0">Select products, set quantities, and complete the payment.</p>
                </div>
                <div class="user-form-mark" aria-hidden="true"><i class="bi bi-cart-check-fill"></i></div>
            </div>

    <div class="row g-4">

        {{-- ================== PRODUK ================== --}}
        <div class="col-md-6">
            <div class="card pos-card">
                <div class="card-body pos-catalog">
                    <div class="pos-card-heading">
                        <div>
                            <h2>Product list</h2>
                            <p>Select items to add to the cart.</p>
                        </div>
                        <i class="bi bi-grid-3x3-gap-fill" aria-hidden="true"></i>
                    </div>
                    <div class="mb-3">
                        <form method="GET" action="{{ route('penjualan.create') }}">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search products..." onkeyup="this.form.submit()">
                        </form>
                    </div>

                    @foreach ($products as $product)
                        <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-2">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="col-7">
                                {{-- ✅ Hapus tanda " yang nyasar --}}
                                <button type="button"
                                    class="btn btn-outline-primary w-100 text-start p-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $product->foto) }}" alt="Product image"
                                            class="rounded-circle" style="width:45px; height:45px; object-fit:cover">
                                        <div>
                                            <div class="fw-semibold">{{ $product->nama }}</div>
                                            <small class="text-muted">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</small>
                                        </div>
                                    </div>
                                </button>
                            </div>

                            <div class="col-3">
                                <input type="number" name="quantity" value="1" min="1"
                                    class="form-control {{ $sale->status === 'COMPLETED' ? '' : '' }}">
                            </div>

                            <div class="col-2">
                                <button type="submit"
                                    class="btn btn-primary w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">+</button>
                            </div>
                        </form>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- ================== KERANJANG ================== --}}
        <div class="col-md-6">
            <div class="card pos-card pos-cart-card">
                <div class="pos-card-heading">
                    <div>
                        <h2>Cart</h2>
                        <p>Review your order before checkout.</p>
                    </div>
                    <i class="bi bi-basket3-fill" aria-hidden="true"></i>
                </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sale->itemPenjualan as $item)
                            <tr>
                                <td>{{ $item->produk->nama }}</td>

                                <td>
                                    <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <input type="number" name="quantity" value="{{ $item->kuantitas }}"
                                            class="form-control form-control-sm">
                                    </form>
                                </td>

                                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                <td>
                                @can('delete', $item)
                                    <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="card-footer pos-cart-footer">
                    <div class="pos-total-label">Total payment</div>
                    <strong class="pos-total">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</strong>

                    <form method="POST" action="{{ route('penjualan.update', $sale->id) }}"
                        onsubmit="return confirm('Are you sure you want to complete this sale?')" class="mt-2">
                        @csrf
                        @method('PUT')

                        <select name="payment_method" class="form-select mb-2">
                            <option value="">Select payment method</option>
                            <option value="CASH">Cash</option>
                            <option value="QRIS">QRIS</option>
                        </select>

                        <button class="btn btn-success w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                            Complete sale
                        </button>
                    </form>
                    @can('delete', $sale)
                    <form action="{{ route('penjualan.destroy', $sale->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to cancel this sale?')">
                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-outline-danger w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                            Cancel sale
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>

    </div>
        </div>
    </div>

@endsection
