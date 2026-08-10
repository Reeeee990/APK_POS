@extends('layouts.app')

@section('title', 'Tambah Types')

@section('content')
<h4>Tambah Jenis</h4>

<form action="{{ route('jenis.store') }}" method="POST">
@include('jenis._form') </form>
@endsection