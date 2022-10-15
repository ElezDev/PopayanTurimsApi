<?php

namespace Database\Seeders;
use App\Models\Calificasione;
use Illuminate\Database\Seeder;

class calificasionesSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    Calificasione::factory(20)->create();

    }
}
