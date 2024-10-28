<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios'; // Asegúrate de que este sea correcto

    protected $fillable = [
        'nombre', 'email', 'password', // Asegúrate de que los campos coincidan con tu tabla
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
