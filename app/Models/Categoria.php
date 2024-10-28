<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Asegúrate de que coincida con el nombre de tu tabla
    protected $fillable = ['nombre']; // Incluye los campos que tu tabla contiene
}
