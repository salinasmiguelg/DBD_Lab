<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
            $table->string('descripcion');

            //Foraneas
            $table->unsignedBigInteger('id_ferias');
            $table->foreign('id_ferias')->references('id')->on('ferias');

            $table->unsignedBigInteger('id_rols');
            $table->foreign('id_rols')->references('id')->on('rols');

            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');

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
        Schema::dropIfExists('puestos');
    }
}
