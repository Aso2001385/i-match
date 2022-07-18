<?php

namespace Database\Factories\Teachers;

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
            'title' =>"title".rand(1,10),
            'contents'=>$this->faker->realText(200,5),
            'due' =>$this->faker->dateTimeBetween('+1 week', '+2 week')
        ];
    }
}
