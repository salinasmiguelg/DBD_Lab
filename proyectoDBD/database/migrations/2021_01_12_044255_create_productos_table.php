<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProducto');
            $table->integer('precioUnitario');
            $table->integer('stock');
            $table->string('categoria');
            //foraneas
            $table->unsignedBigInteger('id_cantidads');
            $table->foreign('id_cantidads')->references('id')->on('cantidads');

            $table->unsignedBigInteger('id_proceso_compras');
            $table->foreign('id_proceso_compras')->references('id')->on('proceso_compras');
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
        Schema::dropIfExists('productos');
    }
}
