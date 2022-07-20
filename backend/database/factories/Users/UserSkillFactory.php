<?php

namespace Database\Factories\Users;

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
            'level'=>rand(1,5),
        ];
    }
}
