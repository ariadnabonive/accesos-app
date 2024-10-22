@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 25px"> 
        <h1 class="text-left" style="font-size: 2rem; color: #fff;">
            Registrar nueva persona
        </h1>
    </div>
    <form action="{{ route('personas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label" style="color:aliceblue">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label" style="color:aliceblue">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
        </div>
        <div class="mb-3">
            <label for="documento_identidad" class="form-label" style="color:aliceblue">Documento de identidad</label>
            <input type="text" class="form-control" id="documento_identidad" name="documento_identidad" value="{{ old('documento_identidad') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label" style="color:aliceblue">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label" style="color:aliceblue">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
        </div>

        <div class="mb-3" style="width: 450px">
            <label for="tipo_persona" class="form-label" style="color:aliceblue">Tipo de Persona</label>
            <select class="form-control" id="tipo_persona" name="tipo_persona">
                <option value="">Selecciona un tipo de persona</option>
                @foreach ($tipos_personas as $tipo_persona)
                    <option value="{{ $tipo_persona }}">{{ $tipo_persona }}</option>
                @endforeach   
            </select>
        </div>

        <!-- Botones -->
        <button type="submit" class="btn btn-primary">Crear persona</button>
        <a href="{{ route('personas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection