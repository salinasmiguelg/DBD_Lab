<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoDespachosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso_despachos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_despacho');
            $table->date('fecha_despacho');
            $table->integer('elementos_despachados');
            $table->integer('coste_despacho');
            $table->boolean('delete');
            $table->unsignedBigInteger('id_direccions');
            $table->foreign('id_direccions')->references('id')->on('direccions');
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
        Schema::dropIfExists('proceso_despachos');
    }
}
