@php
    $type = $type ?? null;
@endphp

@csrf

<div class="mb-3">
    <label class="form-label">Nama Jenis</label>
    <input type="text" name="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror"
        value="{{ old('nama_jenis', optional($type)->nama_jenis ?? '') }}">
    @error('nama_jenis')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<button class="btn btn-success">Simpan</button>
<a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
