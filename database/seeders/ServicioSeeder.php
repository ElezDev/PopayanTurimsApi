<?php

namespace Database\Seeders;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $servicio = new Servicio();
    //      $servicio->nombre = "probandoo";
    //     $servicio->descripcion  = "probandoo";
    //     $servicio->ubicasion  = "por ahi";
    //      $servicio->horarios  = "todo el dia";
    //  $servicio->tiposervicios_id  = "1";
    //  $servicio->save();
    Servicio::factory(20)->create();

    }
}
