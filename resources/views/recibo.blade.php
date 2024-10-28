<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Pedido</title>
    <style>
        .recibo-container { 
            width: 300px; 
            margin: auto; 
        }
        .recibo-header, .recibo-footer { 
            text-align: center; 
        }
        .recibo-items { 
            margin-top: 20px; 
        }

        @media print {
            /* Oculta elementos que no quieres imprimir */
            button {
                display: none; /* Ocultar botón de imprimir */
            }
        }
    </style>
</head>
<body>
 <div class="container">
    <h2>Recibo de Pedido</h2>
    <p><strong>Cajero:</strong> {{ $pedido->usuario->nombre }}</p>
    <p><strong>Cliente:</strong> {{ $pedido->cliente_nombre }}</p>
    <p><strong>Método de Pago:</strong> {{ $pedido->metodo_pago }}</p>
    <p><strong>Total:</strong> ${{ $pedido->total }}</p>
    
    <h4>Detalles del Pedido:</h4>
    <ul>
        @foreach ($pedido->detalles as $detalle)
            <li>{{ $detalle->producto->nombre }} x {{ $detalle->cantidad }} = ${{ $detalle->precio * $detalle->cantidad }}</li>
        @endforeach
    </ul>

    <button onclick="window.print()">Imprimir Recibo</button>
 </div>

    <script>
        function handlePrint() {
            console.log('El botón de imprimir ha sido clickeado');
            window.print();
        }
    </script>
</body>
</html>
