@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
	<div class="page-section user-form-page">
		<div class="user-form-panel card">
			<div class="user-form-heading">
				<div>
					<span class="badge-soft"><i class="bi bi-pencil-square" aria-hidden="true"></i> Perbarui akun</span>
					<h1 class="mt-3 mb-1">Edit pengguna</h1>
					<p class="text-muted mb-0">Perbarui detail dan hak akses pengguna.</p>
				</div>
				<div class="user-form-mark" aria-hidden="true"><i class="bi bi-person-vcard-fill"></i></div>
			</div>

			<form action="{{ route('admin.users.update', $user) }}" method="post">
				@include('users._form')
			</form>
		</div>
	</div>
@endsection