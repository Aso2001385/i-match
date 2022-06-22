<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class SkillRequestTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        for($i = 0; $i <15;$i++){
            $request=[
                'skill_request_id'=>rand(1,30),
                'skill_id'=>rand(1,30),
                'teacher_id'=>rand(1,10),
            ];
            DB::table('skill_request_teacher')->insert($request);
        }
        Schema::enableForeignKeyConstraints();
    }
}
