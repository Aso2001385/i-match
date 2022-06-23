<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RecruitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $purpose=['勉強会','開発','その他'];
        return [
            'usre_id' =>rand(1,10),
            'title' =>$this->faker->country(),
            'contents'=>$this->faker->realText(200,1),
            'purpose' =>Arr::random($purpose),
            'persons'=>rand(1,20),
            'due' =>$this->faker->dateTimeBetween('+1 week', '+2 week')
        ];
    }
}
