<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToDetallesPedidosTable extends Migration
{
    public function up()
    {
        Schema::table('detalles_pedidos', function (Blueprint $table) {
            $table->timestamps(); // Esto añade las columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::table('detalles_pedidos', function (Blueprint $table) {
            $table->dropTimestamps(); // Esto eliminará las columnas created_at y updated_at
        });
    }
}

