@extends('layouts.app')

@section('title', 'Products')

@section('content')

    @include('layouts.navbar')

    @php
        $showProductActions = auth()->user()->role->name === 'admin';
    @endphp

    <div class="page-section">
        <div class="page-panel card">
            <div class="section-header">
                <div>
                    <h1>Products</h1>
                    <p class="text-muted">Manage your available products.</p>
                </div>
                <div class="page-actions">
                    @can('create', App\Models\Produk::class)
                        <a href="{{ route('produk.create') }}" class="btn btn-primary">Add Product</a>
                    @endcan
                    <form action="{{ route('produk.index') }}" method="GET" class="w-100 w-md-auto">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search product name" aria-label="Search product name">
                            <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Purchase Price</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Stock</th>
                                @if ($showProductActions)
                                    <th scope="col">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                                    <td>{{ $product->user->name }}</td>
                                    <td><img src="{{ asset('storage/' . $product->foto) }}" class="product-thumbnail" alt="Photo of {{ $product->nama }}"></td>
                                    <td>{{ $product->nama }}</td>
                                    <td>{{ optional($product->jenis)->nama_jenis ?? '-' }}</td>
                                    <td>Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($product->stok <= 0)
                                            <span class="badge stock-badge stock-empty">Out of Stock</span>
                                        @elseif ($product->stok <= 15)
                                            <span class="badge stock-badge stock-critical">Critical</span>
                                        @elseif ($product->stok <= 35)
                                            <span class="badge stock-badge stock-low">Low</span>
                                        @else
                                            <span class="badge stock-badge stock-safe">Safe</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->stok }}</td>
                                    @if ($showProductActions)
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center gap-2 h-100">
                                                @can('update', $product)
                                                    <a href="{{ route('produk.edit', $product) }}" class="btn btn-sm btn-secondary">Edit</a>
                                                @endcan

                                                @can('delete', $product)
                                                    <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $showProductActions ? 9 : 8 }}" class="text-center text-muted">No data available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">{{ $products->links() }}</div>
        </div>
    </div>
@endsection
