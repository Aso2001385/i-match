<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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
            DB::table('recruit_skill')->insert($recruit_skill);
        }
        Schema::enableForeignKeyConstraints();
    }
}
