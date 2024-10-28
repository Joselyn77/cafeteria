<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Indica la tabla en caso de que no sea el plural estándar
    protected $table = 'usuarios'; // Asegúrate de que este sea el nombre correcto de la tabla

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Puedes agregar otros métodos o propiedades que necesites
}
