
@php
    $produk = $produk ?? null;
@endphp

<div class="product-media-row">
    <div class="mb-3">
        <label class="form-label" for="product-photo">Product image</label>
        <input id="product-photo" type="file" name="foto" onchange="previewImage(this)"
            class="form-control @error('foto') is-invalid @enderror">
        @error('foto')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="product-preview">
        <span class="form-label">Image preview</span>
        @if (!empty($produk?->foto))
            <img id="preview" src="{{ asset('storage/' . $produk->foto) }}" alt="Photo of {{ $produk->nama }}">
        @else
            <img id="preview" alt="Image preview" style="display:none">
            <span class="product-preview-empty">No image yet</span>
        @endif
    </div>
</div>

<div class="user-form-grid product-fields">
<div class="mb-3">
    <label class="form-label" for="product-name">Product name</label>
    <input id="product-name" type="text" name="name" placeholder="Example: Coffee latte"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', optional($produk)->nama ?? '') }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="product-type">Product type</label>
    <select id="product-type" name="jenis_id" class="form-select @error('jenis_id') is-invalid @enderror">
        <option value="">Select product type</option>
        @foreach($jenis as $item)
            <option value="{{ $item->id }}" {{ old('jenis_id', optional($produk)->jenis_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->nama_jenis }}
            </option>
        @endforeach
    </select>
    @error('jenis_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="purchase-price">Purchase price</label>
    <input id="purchase-price" type="number" name="purchase_price" placeholder="0" min="0"
        class="form-control @error('purchase_price') is-invalid @enderror"
        value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">
    @error('purchase_price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="selling-price">Selling price</label>
    <input id="selling-price" type="number" name="selling_price" placeholder="0" min="0"
        class="form-control @error('selling_price') is-invalid @enderror"
        value="{{ old('selling_price', $produk->harga_jual ?? '') }}">
    @error('selling_price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label" for="product-stock">Stock</label>
    <input id="product-stock" type="number" name="stock" placeholder="0" min="0"
        class="form-control @error('stock') is-invalid @enderror"
        value="{{ old('stock', $produk->stok ?? '') }}">
    @error('stock')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

</div>

<div class="user-form-actions">
    <a href="{{ route('produk.index') }}" class="btn btn-light"><i class="bi bi-arrow-left" aria-hidden="true"></i> Cancel</a>
    <button class="btn btn-primary" type="submit"><i class="bi bi-check2" aria-hidden="true"></i> Save product</button>
</div>
<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const file = input.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>
