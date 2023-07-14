<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            // $table->string('id');
            // $table->string('nombre');
            // $table->string('contrasena');
            // $table->integer('codigorol')->unsigned();
            // $table->timestamps();
            // $table->primary('id');
            // $table->foreign('codigorol')
            // ->references('id')->on('rols')
            // ->onDelete('cascade');

            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('contrasena');

            $table->unsignedBigInteger('rols_id')->uniqid();

            $table->timestamps();

            $table->foreign('rols_id')
            ->references('id')->on('rols')
            ->onDelete('set null'); // Si elimina un rol, setea en el campo rols_id el valor de null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
