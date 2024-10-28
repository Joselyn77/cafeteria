<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodos_pago'; // Asegúrate de que esto coincida con tu tabla
    protected $fillable = ['nombre_metodo'];
}
