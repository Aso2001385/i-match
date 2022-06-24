<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id'=>rand(1,10),
            'title'=>$this->factory->country(),
            'contents'=>$this->factory->realText(200,5),
            'due' =>$this->faker->dateTimeBetween('+1 week', '+2 week')
        ];
    }
}
