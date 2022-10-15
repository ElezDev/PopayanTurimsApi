<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->string('direccion');
            $table->string('horarios');
            $table->string('descripcion');
            $table->string('foto_url')->nullable();

             #relaciones normales
             $table->unsignedBigInteger('tipolugar_id')->unsigned()->nullable();
             $table->foreign('tipolugar_id')->references('id')->on('tipolugars');

             $table->unsignedBigInteger('ruta_id')->unsigned()->nullable();
             $table->foreign('ruta_id')->references('id')->on('rutas');

             $table->unsignedBigInteger('gastronomia_id')->unsigned()->nullable();
             $table->foreign('gastronomia_id')->references('id')->on('gastronomias');

             $table->unsignedBigInteger('evento_id')->unsigned()->nullable();
             $table->foreign('evento_id')->references('id')->on('eventos');

             $table->unsignedBigInteger('calificasione_id')->unsigned()->nullable();
             $table->foreign('calificasione_id')->references('id')->on('calificasiones');

             $table->unsignedBigInteger('servicio_id')->unsigned()->nullable();
             $table->foreign('servicio_id')->references('id')->on('servicios');



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
        Schema::dropIfExists('lugars');
    }
}
