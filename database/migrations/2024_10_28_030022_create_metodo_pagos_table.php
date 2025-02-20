<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodoPagosTable extends Migration
{
    public function up()
    {
        Schema::create('metodo_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Ej: 'Tarjeta', 'Efectivo'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metodo_pagos');
    }
}
