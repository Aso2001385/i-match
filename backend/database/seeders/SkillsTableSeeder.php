<?php

namespace Database\Seeders;

use App\Models\Skills\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Skill::factory(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
