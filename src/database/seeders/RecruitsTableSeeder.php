<?php

namespace Database\Seeders;

use App\Models\Recruits\Recruit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RecruitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Recruit::factory(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
