<div class="container">
    <style>
        /* Estilos para el carrito flotante */
        .cart-overlay {
            position: fixed;
            right: 0;
            top: 0;
            width: 25%;
            height: 100vh;
            background-color: #f8f9fa;
            border-left: 1px solid #ddd;
            padding: 1rem;
            overflow-y: auto;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            transform: translateX(100%);
            z-index: 1000;
        }

        /* Mostrar el carrito cuando se activa la clase 'show' */
        .cart-overlay.show {
            transform: translateX(0);
        }

        /* Estilos para los productos */
        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Tarjeta de cada producto */
        .card {
            flex: 1 0 calc(33.333% - 20px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            height: 350px;
        }

        /* Imagen de cada producto */
        .card img {
            max-height: 150px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Controles de cantidad */
        .quantity-control {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .quantity-control button {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .card {
                flex: 1 0 calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .card {
                flex: 1 0 calc(100% - 20px);
            }
        }

        @media print {
         /* Ocultar campos y botones no deseados en la impresión */
         #clientName, .btn-danger, .btn-secondary, .form-control, label {
           display: none;
         }
        }

    </style>

    <div class="product-container">
        @foreach ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/productos/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">Costo: ${{ $producto->costo }}</p>
                        <div class="quantity-control">
                            <button type="button" class="btn btn-success" wire:click="decrementQuantity({{ $producto->id }})">-</button>
                            <span class="mx-2">{{ $cartItems[$producto->id]['cantidad'] ?? 1 }}</span>
                            <button type="button" class="btn btn-success" wire:click="incrementQuantity({{ $producto->id }})">+</button>
                        </div>
                        <button class="btn btn-primary mt-2" wire:click="addToCart({{ $producto->id }})">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="cart-overlay {{ $showCart ? 'show' : '' }}">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Carrito de compras</h4>
            <!-- Botón para vaciar el carrito -->
            <button class="btn btn-danger btn-sm" wire:click="clearCart">X</button>
        </div>

        <div class="mb-3">
            <strong>Cajero:</strong> {{ $cajeroName }}
        </div>
        <div class="mb-3">
            <label for="clientName">Nombre del Cliente:</label>
            <input type="text" id="clientName" class="form-control" wire:model="clientName">
        </div>
        <div class="mb-3">
            <label for="metodoPago">Método de Pago:</label>
            <select id="metodoPago" class="form-control" wire:model="selectedMetodoPago">
                <option value="">Selecciona un método</option>
                @foreach ($metodosPago as $metodo)
                    <option value="{{ $metodo }}">{{ $metodo }}</option>
                @endforeach
            </select>
        </div>
        <ul class="list-group mb-3">
            @foreach ($cartItems as $productId => $item)
                <li class="list-group-item d-flex justify-content-between align-items-center mt-2">
                    {{ $item['nombre'] }} x {{ $item['cantidad'] }}
                    <span>${{ $item['precio'] * $item['cantidad'] }}</span>
                </li>
            @endforeach
        </ul>
        <div class="mb-3">
            <strong>Total:</strong> ${{ $total }}
        </div>
        <button class="btn btn-success" wire:click="confirmarPedido">Confirmar Pedido</button>
        <button class="btn btn-secondary" onclick="printCart()">Imprimir Carrito</button>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>

<script>
    function printCart() {
        var printContents = document.querySelector('.cart-overlay').innerHTML;
        var clientName = document.getElementById('clientName').value; // Obtener el nombre del cliente
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(`
            <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        .list-group-item { display: flex; justify-content: space-between; }
                    </style>
                </head>
                <body>
                    <h4>Carrito de Compras</h4>
                    <p><strong>Nombre del Cliente:</strong> ${clientName}</p> <!-- Incluir nombre del cliente -->
                    <div>${printContents}</div>
                </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
        };
    }
</script>

