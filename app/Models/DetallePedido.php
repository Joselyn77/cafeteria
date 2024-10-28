<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    // Especifica la tabla asociada
    protected $table = 'detalles_pedidos';

    // Especifica los campos que se pueden asignar en masa
    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio',
        'created_at',  // Opcional: Laravel manejará automáticamente estos campos
        'updated_at',  // Opcional: Laravel manejará automáticamente estos campos
    ];

    // Si quieres usar la propiedad timestamps, asegúrate de que esté habilitada
    public $timestamps = true; // Esto es true por defecto, puedes omitirlo

    // Define las relaciones si es necesario
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
