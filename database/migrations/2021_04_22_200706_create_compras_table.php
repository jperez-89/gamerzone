<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            // $table->id();
            // $table->integer('codigojuego')->unsigned();
            // $table->string('codigousuario');
            // $table->timestamps();
            // $table->foreign('codigojuego')
            // ->references('id')->on('juegos')
            // ->onDelete('cascade');
            // $table->foreign('codigousuario')
            // ->references('id')->on('usuarios')
            // ->onDelete('cascade');

            $table->id();

            $table->unsignedBigInteger('juego_id')->unsigned();
            $table->unsignedBigInteger('usuario_id')->unsigned();
            $table->timestamps();

            $table->foreign('juego_id')->references('id')->on('juegos')->onDelete('set null'); // Si eliimina un juego setea valor null
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null'); // Si elimina un usuario setea el valor null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
