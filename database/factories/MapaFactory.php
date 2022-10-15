<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MapaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gps' => $this->faker->sentence(),
		'ubicacion' => $this->faker->sentence(),
		'multimedia'=> $this->faker->sentence(),
        ];
    }
}
