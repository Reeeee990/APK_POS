@extends('layouts.app')

@section('title', 'Add Product Type')

@section('content')
    <div class="page-section user-form-page">
        <div class="user-form-panel card">
            <div class="user-form-heading">
                <div>
                    <span class="badge-soft"><i class="bi bi-tags-fill" aria-hidden="true"></i> Product categories</span>
                    <h1 class="mt-3 mb-1">Add product type</h1>
                    <p class="text-muted mb-0">Add a new type to organize your products.</p>
                </div>
                <div class="user-form-mark" aria-hidden="true"><i class="bi bi-tag-fill"></i></div>
            </div>

            <form action="{{ route('jenis.store') }}" method="POST">
                @include('jenis._form')
            </form>
        </div>
    </div>
@endsection