<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\MetodoPago;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\DetallePedido;

class ProductosComponent extends Component
{
    public $productos;
    public $cartItems = [];
    public $showCart = false;
    public $clientName;
    public $cajeroName;
    public $selectedMetodoPago; // Variable para el método de pago seleccionado
    public $metodosPago = []; // Propiedad para almacenar los métodos de pago
    public $total = 0;

    public function mount()
    {
        $this->productos = Producto::all();
        $this->cajeroName = Auth::check() ? Auth::user()->nombre : 'Cajero';

        // Obtener los métodos de pago de la base de datos
        $this->metodosPago = MetodoPago::pluck('nombre_metodo')->toArray();
    }

    public function addToCart($productId)
    {
        $producto = Producto::find($productId);
        if ($producto) {
            $this->cartItems[$productId] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->costo,
                'cantidad' => 1,
            ];
            $this->updateTotal();
            $this->showCart = true;
        }
    }

    public function incrementQuantity($productId)
    {
        if (isset($this->cartItems[$productId])) {
            $this->cartItems[$productId]['cantidad']++;
            $this->updateTotal();
        }
    }

    public function decrementQuantity($productId)
    {
        if (isset($this->cartItems[$productId]) && $this->cartItems[$productId]['cantidad'] > 1) {
            $this->cartItems[$productId]['cantidad']--;
        } elseif (isset($this->cartItems[$productId]) && $this->cartItems[$productId]['cantidad'] === 1) {
            unset($this->cartItems[$productId]);
        }
        $this->updateTotal();
    }

    public function clearCart()
    {
     $this->cartItems = [];
     $this->updateTotal();
     $this->showCart = false; // Ocultar el carrito
    }

    // Método para actualizar el total
    public function updateTotal()
    {
        $this->total = array_reduce($this->cartItems, function ($carry, $item) {
            return $carry + ($item['precio'] * $item['cantidad']);
        }, 0);
    }

    public function confirmarPedido()
{
    // Lógica para crear el pedido
    $pedido = Pedido::create([
        'usuario_id' => Auth::id(),
        'total' => $this->total,
        'metodo_pago' => $this->selectedMetodoPago,
    ]);

    foreach ($this->cartItems as $item) {
        DetallePedido::create([
            'pedido_id' => $pedido->id,
            'producto_id' => $item['id'],
            'cantidad' => $item['cantidad'],
            'precio' => $item['precio'],
        ]);
    }

    // Preparar datos para la factura
    $facturaData = [
        'clientName' => $this->clientName,
        'cajeroName' => $this->cajeroName,
        'cartItems' => $this->cartItems,
        'total' => $this->total,
    ];

    // Limpiar el carrito
    $this->cartItems = [];
    $this->clientName = '';
    $this->showCart = false;

    session()->flash('success', 'Pedido confirmado y guardado correctamente.');

    // Emitir el evento para mostrar la factura
    $this->emit('showFacturaModal', $facturaData);
}

    
    public function render()
    {
        return view('livewire.productos-component');
    }
}
