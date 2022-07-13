<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Recruits\RecruitSkill;

class RecruitSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        for($i = 0; $i <30;$i++){
            $recruit_skill=[
                'recruit_id'=>rand(1,30),
                'skill_id'=>rand(1,30),
                'level'=>rand(1,5),
            ];
            RecruitSkill::create($recruit_skill);
        }
        Schema::enableForeignKeyConstraints();
    }
}
