<?php

namespace Database\Factories;
use App\Models\Tipoevento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'  => $this->faker->sentence(),
            'ubicacion'  => $this->faker->sentence(),
            'horarios' => $this->faker->sentence(),
            'fechainicio'  => $this->faker->sentence(),
            'fechafin'  => $this->faker->sentence(),
            'tipoeventos_id' => Tipoevento::inRandomOrder()->first()->id,
            'foto_url'=>$this->faker->imageUrl(800,600),
        ];
    }
}
