<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['usuario_id', 'total', 'metodo_pago', 'client_name'];

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
