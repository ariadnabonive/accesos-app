@extends('layouts.app')

@section('content')
    <div class="container">  
        <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 15px"> 
            <h1 class="text-left" style="font-size: 2rem; color: #fff;">
                Listado de roles
            </h1>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">+ Crear nuevo rol</a> 
        </div>
        <div class="table-responsive"> 
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td style="color:aliceblue">{{ $rol->id }}</td>
                            <td style="color:aliceblue">{{ $rol->name }}</td>
                            <td style="color:aliceblue">{{ $rol->descripcion }}</td>
                            <td>
                                <a href="{{ route('roles.show', $rol->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-secondary">Editar</a>
                                <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
