<?php

namespace Database\Factories;

use App\Models\Tipoplato;

use Illuminate\Database\Eloquent\Factories\Factory;

class GastronomiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'ubicacion'=> $this->faker->sentence(),
            'descripcion'=> $this->faker->sentence(),
            'horarios'=> $this->faker->sentence(),
            'tipoplato_id' => Tipoplato::inRandomOrder()->first()->id


        ];
    }
}
