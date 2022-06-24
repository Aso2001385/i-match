<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationCategotiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $category =['オファー希望','チャット申請','チャット','スキル申請','スキル承諾'];
        for($i=0;$i<5;$i++){
            $infocategory=[
                'name'=>$category[$i],
            ];
            DB::table('skill_categories')->insert($infocategory);
        }
    }
}
