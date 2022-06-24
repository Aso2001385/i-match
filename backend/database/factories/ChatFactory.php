<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id'=>rand(1,20),
            'user_id'=>rand(1,10),
            'message'=>$this->faker->realText(255,1),
            'read' =>$this->faker->boolean(50),
        ];
    }
}
