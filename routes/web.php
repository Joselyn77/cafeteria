<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController; // Importar el componente de Livewire
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\OrderController;




Route::get('/', function () {
    return redirect()->route('login'); // Redirige a la ruta de inicio de sesión
});

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para el dashboard, asegurándote de que el usuario esté autenticado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


// Rutas de administración de categorías
Route::middleware(['auth'])->group(function () {
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
});



// Rutas para productos (manteniendo el controlador)
Route::middleware('auth')->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});
// Ruta para confirmar el pedido en el componente Livewire
Route::post('/confirmar-pedido', [PedidoController::class, 'confirmarPedido'])->name('pedido.confirmar');

// Ruta para mostrar el recibo de un pedido específico
Route::get('/pedido/{id}/recibo', [PedidoController::class, 'recibo'])->name('pedido.recibo');

//Route::post('/confirmar-pedido', [OrderController::class, 'confirm'])->name('confirmar.pedido');


Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{id}/pdf', [PedidoController::class, 'generarPDF'])->name('pedidos.pdf');
