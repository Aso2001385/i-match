<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Skills\SkillCategory;

class SkillCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name=['language','framework','database','infrastructure','other'];
        for($i=0;$i<5;$i++){
            $category=[
                'name'=>$name[$i],
            ];
            SkillCategory::create($category);
        }
    }
}
