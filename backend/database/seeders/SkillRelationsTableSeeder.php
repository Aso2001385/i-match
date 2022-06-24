<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SkillRelationsTableSeeder extends Seeder
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
            $skillrelation=[
                'primary_skill_id'=>rand(1,30),
                'secondary_skill_id'=>rand(1,30),
            ];
            DB::table('skill_relations')->insert($skillrelation);
        }
        
        Schema::enableForeignKeyConstraints();
    }
}
