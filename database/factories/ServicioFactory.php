<?php

namespace Database\Factories;

use App\Models\Tiposervicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
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
		'descripcion'=> $this->faker->sentence(),
		'ubicacion'=> $this->faker->sentence(),
		'horarios'=> $this->faker->sentence(),
		'tiposervicio_id'=> Tiposervicio::inRandomOrder()->first()->id




        ];
    }
}
