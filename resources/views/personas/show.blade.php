@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 25px"> 
        <h1 class="text-left" style="font-size: 2rem; color: #fff;">
            {{ $persona->nombre }} {{ $persona->apellido }}
        </h1>
    </div>

    <div style="margin-top: 25px; color:aliceblue"> 
        <p ><strong>ID:</strong> {{ $persona->id }}</p>
        <p ><strong>Nombre:</strong> {{ $persona->nombre }}</p>
        <p ><strong>Apellido:</strong> {{ $persona->apellido }}</p>
        <p ><strong>Documento de identidad:</strong> {{ $persona->documento_identidad  }}</p>
        <p ><strong>Email:</strong> {{ $persona->email  }}</p>
        <p ><strong>Teléfono:</strong> {{ $persona->telefono  }}</p>
        <p ><strong>Tipo de persona:</strong> {{ $persona->tipo_persona  }}</p>
        <p ><strong>Fecha de creación:</strong> {{ $persona->created_at }}</p>
        <p ><strong>Fecha de actualizacion:</strong> {{ $persona->updated_at }}</p>
    </div>

    <div style="margin-top: 25px;"> 
        <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-warning">Modificar</a>
        <a href="{{ route('personas.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div> 
</div>
@endsection
