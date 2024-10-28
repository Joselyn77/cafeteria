<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Barryvdh\DomPDF\Facade as PDF; // Importa la clase PDF desde el espacio de nombres correcto

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('detalles')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function generarPDF($id)
    {
        $pedido = Pedido::with('detalles')->findOrFail($id);
        
        // Generar el PDF
        $pdf = PDF::loadView('pedidos.pdf', compact('pedido'));
        
        // Descargar el PDF
        return $pdf->download('pedido_' . $pedido->id . '.pdf');
    }
}
