@extends('layouts.app')

@section('title', 'Sale Details')

@section('content')
    @include('layouts.navbar')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Sale Details</h1>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Cashier:</strong> {{ $penjualan->user->name }}</p>
            <p><strong>Transaction Date:</strong> {{ $penjualan->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Total Payment:</strong> Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}</p>
            <p><strong>Payment Method:</strong> {{ $penjualan->metode_pembayaran }}</p>
            <p><strong>Status:</strong> {{ $penjualan->status }}</p>

            <hr>

            <h5>Product List</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
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
