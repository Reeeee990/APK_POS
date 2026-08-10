@csrf

<div class="mb-3">
    <label class="form-label">Nama Jenis</label>
    <input type="text" name="name" class="form-control @error('nama_jenis') is-invalid @enderror"
        value="{{ old('name', $type->nama_jenis ?? '') }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<button class="btn btn-success">Simpan</button>
<a href="{{ route('admin.users') }}" class="btn btn-secondary">Kembali</a>
