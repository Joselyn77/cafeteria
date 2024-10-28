@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    @livewireStyles
</head>
<body>

    <h1>Categorías</h1>

    <!-- Botón para agregar nueva categoría -->
    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Agregar Nueva Categoría</a>

    <!-- Tabla para mostrar las categorías -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Llama al componente Livewire para mostrar las categorías -->
    @livewire('categorias-component')

    @livewireScripts
</body>
</html>
@endsection
