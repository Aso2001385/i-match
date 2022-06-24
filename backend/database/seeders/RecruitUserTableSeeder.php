<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RecruitUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        for($i=0;$i<30;$i++){
            $recruit_user=[
                'recruit_id'=>rand(1,30),
                'user_id'=>rand(1,10),
            ];
        }
        DB::table('recruit_user')->insert($recruit_user);
        Schema::enableForeignKeyConstraints();
    }
}
