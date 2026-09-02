@extends('layouts.app')

@section('title', 'Product Types')

@section('content')

    @include('layouts.navbar')

    <div class="page-section">
        <div class="page-panel card">
            <div class="section-header d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h1>Product Types</h1>
                    <p class="text-muted">Manage product categories.</p>
                </div>
                <a href="{{ route('jenis.create') }}" class="btn btn-primary">Add Type</a>
            </div>

            <form action="{{ route('jenis.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Search product types">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Type</th>
                                <th scope="col">Created By</th>
                                <th scope="col" class="actions-column jenis-actions-column">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <th scope="row">{{ $types->firstItem() + $loop->index }}</th>
                                    <td data-label="Product Type">{{ $type->nama_jenis }}</td>
                                    <td data-label="Created By">{{ $type->user?->name ?? 'Unknown' }}</td>
                                    <td class="actions-cell">
                                        <div class="jenis-actions">
                                        <a href="{{ route('jenis.edit', $type) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('jenis.destroy', $type) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this type?')">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No data available.</td>
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
