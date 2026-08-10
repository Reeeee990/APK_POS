@extends('layouts.app')

@section('title', 'Users')

@section('content')

    @include('layouts.navbar')

    <h1>Halaman User</h1>
    <a href="{{ route('jenis.create') }}" class="btn btn-primary">Create</a>

    <form action="{{ route('admin.users') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Search username or email">
            <button class="btn btn-outline-secondary" type="submit">
                Search
            </button>
        </div>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        @foreach ($types as $type)
            <tr>
                <td>{{ $types->firstItem() + $loop->index }}</td>
                <td>{{ $type->nama_jenis }}</td>
                
                    <a href="{{ route('jenis.edit', $type->id) }}" class="btn btn-sm btn-warning">
                        Edit Akun
                    </a>
                    ||
                    <form action="{{ route('jenis.destroy', $type) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick ="return confirm('Yakin hapus user ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
