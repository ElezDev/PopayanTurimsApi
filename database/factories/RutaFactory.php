<?php

namespace Database\Factories;
use App\Models\Mapa;
use Illuminate\Database\Eloquent\Factories\Factory;

class RutaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'ubicacion'  => $this->faker->sentence(),
		'horarios' => $this->faker->sentence(),
		'descripcion'  => $this->faker->sentence(),
		'mapas_id'  => Mapa::inRandomOrder()->first()->id
        ];
    }
}
