<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedido {{ $pedido->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { margin: 0 0 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Detalles del Pedido #{{ $pedido->id }}</h1>
    <p><strong>Nombre del Cliente:</strong> {{ $pedido->client_name }}</p>
    <p><strong>Método de Pago:</strong> {{ $pedido->metodo_pago }}</p>
    <p><strong>Total:</strong> ${{ number_format($pedido->total, 2) }}</p>

    <h2>Productos</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td> <!-- Asegúrate de que tienes la relación con Producto -->
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ number_format($detalle->precio, 2) }}</td>
                    <td>${{ number_format($detalle->precio * $detalle->cantidad, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
