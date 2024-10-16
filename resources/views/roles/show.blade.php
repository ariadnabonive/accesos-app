@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Rol: {{ $rol->name }}</h1>

    <p><strong>ID:</strong> {{ $rol->id }}</p>
    <p><strong>Descripción:</strong> {{ $rol->descripcion }}</p>

    <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver a la Lista</a>
</div>
@endsection
