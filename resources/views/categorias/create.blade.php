@extends('layouts.app')

@section('content')

<h1>Agregar Nueva Categoría</h1>

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de la Categoría</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <button type="submit" class="btn btn-primary">Crear Categoría</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
