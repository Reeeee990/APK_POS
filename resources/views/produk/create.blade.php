@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="page-section user-form-page product-form-page">
        <div class="user-form-panel card">
            <div class="user-form-heading">
                <div>
                    <span class="badge-soft"><i class="bi bi-box-seam-fill" aria-hidden="true"></i> Inventory</span>
                    <h1 class="mt-3 mb-1">Add product</h1>
                    <p class="text-muted mb-0">Add a new product to the sales catalog.</p>
                </div>
                <div class="user-form-mark" aria-hidden="true"><i class="bi bi-box-seam-fill"></i></div>
            </div>

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('produk._form')
            </form>
        </div>
    </div>
@endsection