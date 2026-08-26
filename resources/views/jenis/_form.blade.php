@php
    $type = $type ?? null;
@endphp

@csrf

<div class="jenis-form-grid">
    <div class="mb-3">
        <label class="form-label" for="jenis-name">Type name</label>
        <input id="jenis-name" type="text" name="nama_jenis" placeholder="Example: Beverages"
            class="form-control @error('nama_jenis') is-invalid @enderror"
            value="{{ old('nama_jenis', optional($type)->nama_jenis ?? '') }}">
        @error('nama_jenis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="user-form-actions">
    <a href="{{ route('jenis.index') }}" class="btn btn-light"><i class="bi bi-arrow-left" aria-hidden="true"></i> Cancel</a>
    <button class="btn btn-primary"><i class="bi bi-check2" aria-hidden="true"></i> Save type</button>
</div>
