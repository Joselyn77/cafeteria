<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtiene todos los productos
        $productos = Producto::all(); // Cambia esto si necesitas algún tipo de filtrado

        // Devuelve la vista con los productos
        return view('productos.index', compact('productos')); // Asegúrate de que la vista exista
    }
}
