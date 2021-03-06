<?php

namespace Database\Factories\Skills;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillRequestFactory extends Factory
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
            'name'=>$this->faker->word(),
            'message'=>$this->faker->realText(200,5),
        ];
    }
}
