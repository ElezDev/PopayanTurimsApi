<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->unsignedBigInteger('tipconvenios_id');
            $table->foreign('tipconvenios_id')->references('id')->on('tipconvenios');
           

           
           
           



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
        Schema::dropIfExists('convenios');
    }
}
