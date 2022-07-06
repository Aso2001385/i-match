<?php

namespace Database\Factories\Informations;

use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,10),
            'title'=>$this->faker->country(),
            'contents'=>$this->faker->realText(255,5),
            'read' => $this->faker->boolean(50),
            'category_id'=>rand(1,5),
            'url'=>$this->faker->url(),
        ];
    }
}
