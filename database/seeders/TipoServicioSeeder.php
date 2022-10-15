<?php

namespace Database\Seeders;
use App\Models\Tiposervicio;
use Illuminate\Database\Seeder;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $tiposervicio = new Tiposervicio();
        // $tiposervicio->nombre = "todos";
        // $tiposervicio->save();
        Tiposervicio::factory(20)->create();

    }
}
