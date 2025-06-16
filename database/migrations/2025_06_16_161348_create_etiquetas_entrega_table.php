<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up()
    {
        Schema::create('etiquetas_entrega', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('vendedor_id');
            $table->uuid('transportadora_id');
            $table->uuid('pedido_id');
            $table->date('data_envio');
            $table->timestamps();

            $table->foreign('vendedor_id')
                  ->references('id')
                  ->on('vendedores');

            $table->foreign('transportadora_id')
                  ->references('id')
                  ->on('transportadoras');

            $table->foreign('pedido_id')
                  ->references('id')
                  ->on('pedidos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('etiquetas_entrega');
    }
};
