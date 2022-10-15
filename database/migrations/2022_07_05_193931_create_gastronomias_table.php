<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastronomiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastronomias', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion');
            $table->string('descripcion');
            $table->string('horarios');

            $table->unsignedBigInteger('tipoplato_id')->unsigned();
            $table->foreign('tipoplato_id')->references('id')->on('tipoplatos');
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
        Schema::dropIfExists('gastronomias');
    }
}
