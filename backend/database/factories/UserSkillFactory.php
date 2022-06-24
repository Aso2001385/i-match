<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>rand(1,10),
            'skill_id' =>rand(1,30),
            'practical_flag'=>$this->faker->boolean(50),
            'learning_flag'=>$this->faker->boolean(50),
            'level'=>rand(1,5),
        ];
    }
}
