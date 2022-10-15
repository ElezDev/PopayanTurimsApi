<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



$this->call(TipoLugarSeeder::class);
$this->call(MapasSeeder::class);
$this->call(RutasSeeder::class);
$this->call(TipoPlatosSeeder::class);
$this->call(GastronomiaSeeder::class);
$this->call(TipoEventoSeeder::class);
$this->call(eventoSeeder::class);
$this->call(TipoServicioSeeder::class);
$this->call(ServicioSeeder::class);
$this->call(calificasionesSeder::class);
$this->call(Roleseeder::class);
$this->call(LugarSeeder::class);
$this->call(UserSeeder::class);
$this->call(PostSeeder::class);







    }

}
