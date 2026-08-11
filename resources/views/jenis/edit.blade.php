@extends('layouts.app')

@section('title', 'Edit Jenis')

@section('content')
<h4>Edit Jenis</h4>

<form action="{{ route('jenis.update', $type) }}" method="post">
    @method('PUT')
    @include('jenis._form')
</form>
@endsection