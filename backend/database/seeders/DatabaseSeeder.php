<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SkillCategoriesTableSeeder::class,
            UsersTableSeeder::class,
            RecruitsTableSeeder::class,
            SkillsTableSeeder::class,
            UserSkillTableSeeder::class,
            RecruitSkillTableSeeder::class,
            RecruitUserTableSeeder::class,
            RoomsTableSeeder::class,
            RoomUSerTableSeeder::class,
            ChatsTableSeeder::class,
            InformationCategotiesTableSeeder::class,
            InformationsTableSeeder::class,
            TeachersTableSeeder::class,
            EventsTableSeeder::class,
            SkillRequestsTableSeeder::class,
            SkillRequestTeacherTableSeeder::class
        ]);
    }
}
