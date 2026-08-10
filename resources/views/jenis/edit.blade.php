@extends('layouts.app')

@section('title', 'Edit Type')

@section('content')
<h4>Edit User</h4>

<form action="{{ route('jenis.update', $type) }}" method="post">
@include('jenis._form') </form>
@endsection