<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso_compras', function (Blueprint $table) {
            $table->id();
            $table->boolean('pagoRealizado');
            $table->date('fechaPago');

            //Foraneas
            $table->unsignedBigInteger('id_comprobantes');
            $table->foreign('id_comprobantes')->references('id')->on('comprobantes');

            $table->unsignedBigInteger('id_proceso_pagos');
            $table->foreign('id_proceso_pagos')->references('id')->on('proceso_pagos');

            $table->unsignedBigInteger('id_proceso_despachos');
            $table->foreign('id_proceso_despachos')->references('id')->on('proceso_despachos');
            $table->boolean('delete');
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
        Schema::dropIfExists('proceso_compras');
    }
}
