<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('vendedor_id');
            $table->string('produto', 100);
            $table->integer('quantidade');
            $table->decimal('valor_total', 10, 2);
            $table->timestamps();

            $table->foreign('vendedor_id')
                  ->references('id')
                  ->on('vendedores');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
