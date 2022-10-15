<?php

namespace Database\Factories;

use App\Models\Tipolugar;
use App\Models\Ruta;
use App\Models\Gastronomia;
use App\Models\Evento;
use App\Models\Calificasione;
use App\Models\Servicio;

use Illuminate\Database\Eloquent\Factories\Factory;

class LugarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'nombre'=> $this->faker->sentence(),
            'direccion'=> $this->faker->sentence(),
            'horarios'=> $this->faker->sentence(),
            'descripcion'=>$this->faker->sentence(),
            'foto_url'=>$this->faker->sentence(),

            'tipolugar_id'=> Tipolugar::inRandomOrder()->first()->id,

            'ruta_id' =>Ruta::inRandomOrder()->first()->id,

            'gastronomia_id'=>Gastronomia::inRandomOrder()->first()->id,

            'evento_id'=>Evento::inRandomOrder()->first()->id,

            'calificasione_id'=>Calificasione::inRandomOrder()->first()->id,

            'servicio_id' =>Servicio::inRandomOrder()->first()->id

        ];
    }
}
