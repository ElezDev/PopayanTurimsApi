<?php

namespace Database\Seeders;
use App\Models\Evento;
use Illuminate\Database\Seeder;

class eventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Evento::factory(20)->create();

    }
}
