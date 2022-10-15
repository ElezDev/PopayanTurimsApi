<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubucacion');
            $table->string('horarios');
            $table->string('fechainicio');
            $table->string('fechafin');
            $table->timestamps();

            $table->unsignedBigInteger('tipoeventos_id')->unsigned();
            $table->foreign('tipoeventos_id')->references('id')->on('tipoeventos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
