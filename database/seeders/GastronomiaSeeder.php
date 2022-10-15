<?php

namespace Database\Seeders;
use App\Models\Gastronomia;
use Illuminate\Database\Seeder;

class GastronomiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Gastronomia::factory(20)->create();


    }
}
