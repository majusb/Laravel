@extends('layouts.main')
@section('title', 'Produto')
@section('content')

<p>Exibindo produto id: {{ $id }}</p>

@if($id != null)
    <p>O produto id: {{ $id }}</p>
@endif
@endsection