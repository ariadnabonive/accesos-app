@extends('layouts.app')

@section('content')
    <div class="container">  
        <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 15px"> 
            <h1 class="text-left" style="font-size: 2rem; color: #fff;">
                Listado de usuarios
            </h1>
            <a href="" class="btn btn-primary">+ Registrar nuevo usuario</a> 
        </div>
        <div class="table-responsive"> 
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Rol</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($users as $usuario)
                    <tr>
                        <td style="color:aliceblue">{{ $usuario->name }}</td>
                        <td style="color:aliceblue">{{ $usuario->email }}</td>
                        <td style="color:aliceblue">{{ $usuario->rol->name ?? 'Sin rol asignado' }}
                        <td style="color:aliceblue">{{ $usuario->created_at  }}
                        <td> 
                              <a href="{{ route('users.show', $usuario->id) }}" class="btn btn-info">Ver</a>
                              <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-secondary">Editar</a>
                              <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                              </form>
                        </td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection