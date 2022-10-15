<?php

namespace Database\Seeders;
use App\Models\Ruta;
use Illuminate\Database\Seeder;

class RutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      

        Ruta::factory(20)->create();

    }
}
