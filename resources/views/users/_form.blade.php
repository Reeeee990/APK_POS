@csrf

<div class="user-form-grid">
<div class="mb-3">
    <label class="form-label" for="user-name">Nama lengkap</label>
    <input id="user-name" type="text" name="name" placeholder="Contoh: Sinta Laras" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $user->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="user-email">Email</label>
    <input id="user-email" type="email" name="email" placeholder="nama@email.com" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $user->email ?? '') }}">
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="user-password">Password</label>
    <input id="user-password" type="password" name="password" placeholder="Masukkan password" class="form-control @error('password') is-invalid @enderror">
    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="user-role">Role akses</label>
    <select id="user-role" name="role_id" class="form-select @error('role_id') is-invalid @enderror">
        <option value="">-- Pilih Role --</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
    @error('role_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
</div>

<div class="user-form-actions">
    <a href="{{ route('admin.users') }}" class="btn btn-light"><i class="bi bi-arrow-left" aria-hidden="true"></i> Batal</a>
    <button class="btn btn-primary"><i class="bi bi-check2" aria-hidden="true"></i> Simpan pengguna</button>
</div>
