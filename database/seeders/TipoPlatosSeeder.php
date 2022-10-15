<?php

namespace Database\Seeders;
use App\Models\Tipoplato;
use Illuminate\Database\Seeder;

class TipoPlatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoplato::factory(20)->create();

    }
}
