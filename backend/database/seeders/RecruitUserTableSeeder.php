<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Recruits\RecruitUser;

class RecruitUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$persons_array=[2, 3, 4, 5, 3];
        $recruit_ids=[1,1, 2,2,2, 3,3,3,3, 4,4,4,4,4, 5, 6,6,6,6,6,6,6,6,6,6];
        $user_ids=   [1,2, 2,1,3, 3,1,2,4, 4,1,2,3,5, 5, 6,1,2,3,4,5,7,8,9,10];
        Schema::disableForeignKeyConstraints();
        for($i=0; $i<count($recruit_ids);$i++){
            $recruit_user=[
                'recruit_id'=>$recruit_ids[$i],
                'user_id'=>$user_ids[$i]
            ];
            RecruitUser::create($recruit_user);
        }
        Schema::enableForeignKeyConstraints();
    }
}
