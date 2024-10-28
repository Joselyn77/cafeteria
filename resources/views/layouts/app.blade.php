<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cafetería D')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="#">Cafetería Coffe Shopp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav d-flex justify-content-between w-100">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productos') }}">Productos</a>
            </li>
            
            <li class="nav-item ms-auto">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<!-- Modal para la factura -->
<div class="modal fade" id="facturaModal" tabindex="-1" aria-labelledby="facturaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="facturaModalLabel">Factura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('factura')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button onclick="window.print()">Imprimir Factura</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('showFacturaModal', function (pedidoId) {
            $('#facturaModal').modal('show'); // Mostrar el modal
        });
    });
</script>
@livewireScripts
</body>
</html>
