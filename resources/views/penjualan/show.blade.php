@extends('layouts.app')

@section('title', 'Sale Details')

@section('content')
    @include('layouts.navbar')

    <div class="sale-detail-heading d-flex justify-content-between align-items-center mb-3">
        <h1>Sale Details</h1>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary" onclick="window.print()">
                <i class="bi bi-printer" aria-hidden="true"></i> Print Receipt
            </button>
            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="card sale-detail-card">
        <div class="card-body receipt-content">
            <div class="receipt-header">
                <div class="receipt-logo"><i class="bi bi-shop" aria-hidden="true"></i></div>
                <div>
                    <h2>Lavender Mart</h2>
                    <p>Point of Sale &bull; Struk Pembayaran</p>
                </div>
            </div>

            <div class="sale-meta">
                <div><span>No. Transaksi</span><strong>LM-{{ str_pad($penjualan->id, 6, '0', STR_PAD_LEFT) }}</strong></div>
                <div><span>Tanggal</span><strong>{{ $penjualan->created_at->format('d/m/Y H:i') }}</strong></div>
                <div><span>Kasir</span><strong>{{ $penjualan->user->name }}</strong></div>
            </div>

            <div class="receipt-divider"><span>RINCIAN BELANJA</span></div>

            <div class="table-responsive">
            <table class="table sale-items-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Produk</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Harga</th>
                        <th class="text-end">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan->itemPenjualan as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item->produk->foto) }}"
                                    class="sale-product-photo" alt="Photo of {{ $item->produk->nama }}">
                            </td>
                            <td>{{ $item->produk->nama }}</td>
                            <td>{{ $item->kuantitas }}</td>
                            <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

            <div class="receipt-total">
                <span>TOTAL BELANJA</span>
                <strong>Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}</strong>
            </div>
            <div class="receipt-payment">
                <span>Metode Pembayaran</span>
                <strong>{{ $penjualan->metode_pembayaran }}</strong>
            </div>
            <p class="receipt-thank-you">{{ $penjualan->status }} &bull; Terima kasih sudah berbelanja</p>
            <p class="receipt-footer">Simpan struk ini sebagai bukti pembayaran.</p>
        </div>
    </div>
@endsection
