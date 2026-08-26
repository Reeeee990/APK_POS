@extends('layouts.app')

@section('title', 'Sales')

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
                    <h1>Sales</h1>
                    <p class="text-muted">Transaction history and payment status.</p>
                </div>
                <div class="page-actions">
                    <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Add Sale</a>
                    <form action="{{ route('penjualan.index') }}" method="GET" class="w-100 w-md-auto">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="Search sales">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
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
                                <th scope="col">Transaction Date</th>
                                <th scope="col">Cashier</th>
                                <th scope="col">Total Payment</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="actions-column sales-actions-column">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $sale)
                                <tr>
                                    <th scope="row">{{ $sales->firstItem() + $loop->index }}</th>
                                    <td data-label="Transaction Date">{{ $sale->created_at->format('d-m-Y H:i') }}</td>
                                    <td data-label="Cashier">{{ $sale->user->name }}</td>
                                    <td data-label="Total Payment">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</td>
                                    <td data-label="Payment Method">{{ $sale->metode_pembayaran }}</td>
                                    <td data-label="Status">{{ $sale->status }}</td>
                                    <td data-label="Actions" class="actions-cell">
                                        <div class="table-actions">
                                        @if ($sale->status === 'OPEN')
                                            <a href="{{ route('penjualan.lanjutan', $sale) }}" class="btn btn-sm btn-success">Continue</a>
                                        @else
                                            <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-sm btn-secondary">Detail</a>
                                        @endif
                                        @if (auth()->user()->role->name === 'admin')
                                            <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this sale?')">Delete</button>
                                            </form>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No sales found.</td>
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
