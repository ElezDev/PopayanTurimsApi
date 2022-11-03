<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Contenido' => $this->faker->sentence(),
            'users_id' =>  User::inRandomOrder()->first()->id,
            'img_post'=>$this->faker->imageUrl(800,600),
        ];
    }
}
