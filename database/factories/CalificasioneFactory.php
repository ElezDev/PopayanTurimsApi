<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CalificasioneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'comentarios'  => $this->faker->sentence(),
            'reseñas'  => $this->faker->sentence(),
        ];
    }
}
