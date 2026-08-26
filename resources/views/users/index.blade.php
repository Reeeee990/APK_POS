@extends('layouts.app')

@section('title', 'Users')

@section('content')

    @include('layouts.navbar')

    <div class="page-section">
        <div class="page-panel card">
            <div class="section-header">
                <div>
                    <span class="badge-soft"><i class="bi bi-people-fill" aria-hidden="true"></i> Access management</span>
                    <h1 class="mt-2 mb-1">Users</h1>
                    <p class="text-muted mb-0">{{ $users->total() }} registered accounts</p>
                </div>
                <div class="page-actions">
                    <form action="{{ route('admin.users') }}" method="GET" class="user-search">
                        <div class="input-group input-group-sm">
                            <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search users..." aria-label="Search users">
                            <button class="btn btn-outline-secondary" type="submit" aria-label="Search" title="Search">
                                <i class="bi bi-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-plus-fill" aria-hidden="true"></i>
                        Add User
                    </a>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" class="actions-column">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $loop->index }}</td>
                                    <td data-label="Name">
                                        <strong>{{ $user->name }}</strong>
                                    </td>
                                    <td data-label="Email">{{ $user->email }}</td>
                                    <td data-label="Role">
                                        <span class="user-role">{{ $user->role->name }}</span>
                                    </td>
                                    <td data-label="Actions" class="actions-cell">
                                        <div class="user-actions">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-secondary" aria-label="Edit {{ $user->name }}" title="Edit account">
                                            <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" aria-label="Delete {{ $user->name }}" title="Delete account" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="bi bi-trash3-fill" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">{{ $users->links() }}</div>
        </div>
    </div>
@endsection
