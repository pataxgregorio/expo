<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participante_id');
            $table->unsignedBigInteger('stand_id');
            $table->double('montocancelado')->nullable();
            $table->string('observacion')->nullable();
            $table->string('negociacion')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->timestamps();
            $table->foreign('participante_id')->references('id')->on('participante');
            $table->foreign('stand_id')->references('id')->on('stand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
