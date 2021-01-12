<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('tipoPago');
            $table->integer('costeTotal');
            $table->date('fechaPago');

            //Foranea
            $table->unsignedBigInteger('id_metodo_de_pagos');
            $table->foreign('id_metodo_de_pagos')->references('id')->on('metodo_de_pagos');

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
        Schema::dropIfExists('proceso_pagos');
    }
}
