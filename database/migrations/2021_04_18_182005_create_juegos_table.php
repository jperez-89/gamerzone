<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id('id');
            $table->integer('codigojuego')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->float('precio');
            $table->integer('stock')->unsigned();
            $table->string('rutafoto');

            $table->unsignedBigInteger('categoria_id')->nullable();
            // $table->integer('idCategoria')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('categoria_id')
            ->references('id')->on('categorias')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juegos');
    }
}
