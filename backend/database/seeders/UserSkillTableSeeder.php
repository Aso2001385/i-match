<?php

namespace Database\Seeders;

use App\Models\Users\UserSkill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        UserSkill::factory(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
