@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

    @include('layouts.navbar')

    @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif

    <div class="page-section">
        <div class="page-panel card">
            <div class="section-header">
                <div>
                    <h1>Penjualan</h1>
                    <p class="text-muted">Riwayat transaksi dan status pembayaran.</p>
                </div>
                <div class="page-actions">
                    <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah Penjualan</a>
                    <form action="{{ route('penjualan.index') }}" method="GET" class="w-100 w-md-auto">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="Cari penjualan">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Kasir</th>
                                <th scope="col">Total Pembayaran</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $sale)
                                <tr>
                                    <th scope="row">{{ $sales->firstItem() + $loop->index }}</th>
                                    <td>{{ $sale->created_at->translatedFormat('d-m-Y H:i') }}</td>
                                    <td>{{ $sale->user->name }}</td>
                                    <td>Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</td>
                                    <td>{{ $sale->metode_pembayaran }}</td>
                                    <td>{{ $sale->status }}</td>
                                    <td class="d-flex gap-2 flex-wrap">
                                        @if ($sale->status === 'OPEN')
                                            <a href="{{ route('penjualan.lanjutan', $sale) }}" class="btn btn-sm btn-success">Lanjutan</a>
                                        @else
                                            <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-sm btn-info">Detail</a>
                                        @endif
                                        @if (auth()->user()->role->name === 'admin')
                                            <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Data Tidak Ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">{{ $sales->links() }}</div>
        </div>
    </div>

@endsection
