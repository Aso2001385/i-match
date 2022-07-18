<?php

namespace Database\Factories\Chats;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomUserFactory extends Factory
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
            'name'=>$this->faker->word(),
        ];
    }
}
