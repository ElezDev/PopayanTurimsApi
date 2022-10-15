<?php

namespace Database\Seeders;
use App\Models\Mapa;
use Illuminate\Database\Seeder;

class MapasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $mapa = new Mapa();
        // $mapa->gps = "prueba";
        // $mapa->ubicacion= "prueba";
        // $mapa->multimedia= "prueba";
        // $mapa->save();

        Mapa::factory(20)->create();
    }

}
