<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodoDePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodo_de_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_tarjeta');
            $table->string('tipo_de_cuenta_bancaria');
            $table->string('banco');
            $table->string('tirular');
            $table->unsignedBigInteger('id_transaccions');
            $table->foreign('id_transaccions')->references('id')->on('transaccions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metodo_de_pagos');
    }
}
