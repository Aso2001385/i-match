<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teachers\Teacher;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory(10)->create();
    }
}
