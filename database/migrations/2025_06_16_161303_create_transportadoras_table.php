<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transportadoras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 100);
            $table->string('endereco', 200);
            $table->string('email', 100);
            $table->string('telefone', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transportadoras');
    }
};
