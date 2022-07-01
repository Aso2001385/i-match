<?php

namespace Database\Factories\Teachers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $i=1;
        return [
            'name'=>$this->faker->name(),
            'email' =>$this->faker->unique()->lastname().'@asojuku.ac.jp',
            'password' =>Hash::make($this->faker->password()),
        ];
    }
}
