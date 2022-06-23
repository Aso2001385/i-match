<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skills\SkillRequest;
use Illuminate\Support\Facades\Schema;

class SkillRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        SkillRequest::factory(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
