@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')
    @include('layouts.navbar')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Detail Penjualan</h1>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Kasir:</strong> {{ $penjualan->user->name }}</p>
            <p><strong>Tanggal Transaksi:</strong> {{ $penjualan->created_at->translatedFormat('d-m-Y H:i') }}</p>
            <p><strong>Total Pembayaran:</strong> Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $penjualan->metode_pembayaran }}</p>
            <p><strong>Status:</strong> {{ $penjualan->status }}</p>

            <hr>

            <h5>Daftar Produk</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan->itemPenjualan as $item)
                        <tr>
                            <td>{{ $item->produk->nama }}</td>
                            <td>{{ $item->kuantitas }}</td>
                            <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
