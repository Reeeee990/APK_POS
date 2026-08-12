@extends('layouts.app')

@section('title', 'Jenis Produk')

@section('content')

    @include('layouts.navbar')

    <div class="page-section">
        <div class="page-panel card">
            <div class="section-header d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h1>Jenis Produk</h1>
                    <p class="text-muted">Kelola kategori jenis produk.</p>
                </div>
                <a href="{{ route('jenis.create') }}" class="btn btn-primary">Tambah Jenis</a>
            </div>

            <form action="{{ route('jenis.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari jenis produk">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis Makanan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <th scope="row">{{ $types->firstItem() + $loop->index }}</th>
                                    <td>{{ $type->nama_jenis }}</td>
                                    <td class="d-flex gap-2 flex-wrap">
                                        <a href="{{ route('jenis.edit', $type) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('jenis.destroy', $type) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus jenis ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Data tidak tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">{{ $types->links() }}</div>
        </div>
    </div>

@endsection
