@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
	<div class="page-section user-form-page">
		<div class="user-form-panel card">
			<div class="user-form-heading">
				<div>
					<span class="badge-soft"><i class="bi bi-person-plus-fill" aria-hidden="true"></i> Akun baru</span>
					<h1 class="mt-3 mb-1">Tambah pengguna</h1>
					<p class="text-muted mb-0">Buat akun dan tentukan aksesnya.</p>
				</div>
				<div class="user-form-mark" aria-hidden="true"><i class="bi bi-person-vcard-fill"></i></div>
			</div>

			<form action="{{ route('admin.users.store') }}" method="POST">
				@include('users._form')
			</form>
		</div>
	</div>
@endsection