@extends('layouts.app')

@section('title', 'Edit Product Type')

@section('content')
    <div class="page-section user-form-page">
        <div class="user-form-panel card">
            <div class="user-form-heading">
                <div>
                    <span class="badge-soft"><i class="bi bi-pencil-square" aria-hidden="true"></i> Product categories</span>
                    <h1 class="mt-3 mb-1">Edit product type</h1>
                    <p class="text-muted mb-0">Update the selected product type.</p>
                </div>
                <div class="user-form-mark" aria-hidden="true"><i class="bi bi-tag-fill"></i></div>
            </div>

            <form action="{{ route('jenis.update', $type) }}" method="post">
                @method('PUT')
                @include('jenis._form')
            </form>
        </div>
    </div>
@endsection