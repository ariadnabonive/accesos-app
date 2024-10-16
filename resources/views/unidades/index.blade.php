@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Unidades</h1>
    <a href="{{ route('unidades.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Crear Nueva Unidad</a>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Descripción</th>
                <th class="py-2 px-4 border-b">Tipo de unidad</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidades as $unidad)
            <tr>
                <td class="py-2 px-4 border-b">{{ $unidad->id }}</td>
                <td class="py-2 px-4 border-b">{{ $unidad->descripcion }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('unidades.show', $unidad) }}" class="text-blue-500">Ver</a>
                    <a href="{{ route('unidades.edit', $unidad) }}" class="text-yellow-500 ml-4">Editar</a>
                    <form action="{{ route('unidades.destroy', $unidad) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-4">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
