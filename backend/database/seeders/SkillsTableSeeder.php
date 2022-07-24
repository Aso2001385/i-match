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
        $name=[
            //langs
            'Java',
            'PHP',
            'JavaScript',
            'Python',
            'C',
            'C++',
            'C#',
            'GO',
            'Kotlin',
            'Swift',
            'Ruby',
            'HTML',
            'CSS',
            'SQL',
            'mark down',
            //frameworks
            'Spring',
            'Laravel',
            'CakePHP',
            'Symfony',
            'React',
            'Angular',
            'Vue.js',
            'Next.js',
            'Nuxt.js',
            'Django',
            'Flask',
            'Qt',
            'Sinatra',
            'Tailwind CSS',
            'Bulma',
            //db
            'PostgreSQL',
            'Oracle Database',
            'MongoDB',
            'MySQL',
            'SQLite',
            'MariaDB',
            //infs
            'Linux',
            'Windows',
            'iOS',
            'Andoroid',
            'AWS',
            'Azure',
            'Google Cloud',
            'Firebase',
            'Salesforce',
            'Docker',
            'xampp',
            //oths
            'figma',
            'GitHub',
            'git',
            'Swagger',
            'Postman',
            'Node.js',
        ];
        for($i=0; $i<count($name); $i++){
            if($i<=14){
                //langs
                $category_id = 1;
            }elseif($i<=29){
                //frameworks
                $category_id = 2;
            }elseif($i<=35){
                //db
                $category_id = 3;
            }elseif($i<=46){
                //infs
                $category_id = 4;
            }else{
                //oths
                $category_id = 5;
            }
            $skill=[
                'name'=>$name[$i],
                'category_id'=>$category_id
            ];

            Skill::create($skill);
        }
        Schema::enableForeignKeyConstraints();
    }
}
