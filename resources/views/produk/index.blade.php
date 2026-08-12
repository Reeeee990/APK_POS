@extends('layouts.app')

@section('title', 'Produk')

@section('content')

    @include('layouts.navbar')

    @php
        $showProductActions = auth()->user()->role->name === 'admin';
    @endphp

    <div class="page-section">
        <div class="page-panel card">
            <div class="section-header">
                <div>
                    <h1>Produk</h1>
                    <p class="text-muted">Kelola daftar produk tersedia.</p>
                </div>
                <div class="page-actions">
                    @can('create', App\Models\Produk::class)
                        <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
                    @endcan
                    <form action="{{ route('produk.index') }}" method="GET" class="w-100 w-md-auto">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search nama produk">
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
                                <th scope="col">User</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Stok</th>
                                @if ($showProductActions)
                                    <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                                    <td>{{ $product->user->name }}</td>
                                    <td>{{ optional($product->jenis)->nama_jenis ?? '-' }}</td>
                                    <td><img src="{{ asset('storage/' . $product->foto) }}" width="100" class="img-thumbnail"></td>
                                    <td>{{ $product->nama }}</td>
                                    <td>Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
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
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah anda yakin akan menghapus produk?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $showProductActions ? 9 : 8 }}" class="text-center text-muted">Data tidak tersedia.</td>
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
