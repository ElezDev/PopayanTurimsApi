<?php

namespace Database\Seeders;
use App\Models\Tipolugar;
use Illuminate\Database\Seeder;

class TipoLugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Tipolugar::factory(20)->create();

  }
}
 