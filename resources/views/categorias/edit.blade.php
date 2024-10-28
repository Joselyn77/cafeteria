@extends('layouts.app')

@section('content')

<h1>Editar Categoría</h1>

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de la Categoría</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
    </div>
    <button type="submit" class="btn btn-success">Actualizar Categoría</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection
