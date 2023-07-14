<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas__detalles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('factura_id');
            $table->string('numeroFactura');
            $table->integer('juego_id');
            $table->integer('cantidad');
            $table->integer('costoTotal');
            $table->timestamps();

            $table->foreign('factura_id')
                ->references('id')->on('facturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas__detalles');
    }
}
