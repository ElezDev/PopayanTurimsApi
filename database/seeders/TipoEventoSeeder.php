<?php

namespace Database\Seeders;
use App\Models\Tipoevento;
use Illuminate\Database\Seeder;

class TipoEventoSeeder extends Seeder
{
    /**php artisan db:seed
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $tipoevento = new Tipoevento();
        // $tipoevento->nombre = "cultural";
        // $tipoevento->save();
        Tipoevento::factory(20)->create();
    }
}
