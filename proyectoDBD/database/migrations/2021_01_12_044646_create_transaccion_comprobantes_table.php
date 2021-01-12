<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion_comprobantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaccions');
            $table->foreign('id_transaccions')->references('id')->on('transaccions');
            $table->unsignedBigInteger('id_comprobantes');
            $table->foreign('id_comprobantes')->references('id')->on('comprobantes');
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
        Schema::dropIfExists('transaccion_comprobantes');
    }
}
