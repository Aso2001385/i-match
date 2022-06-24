<?php

namespace Database\Seeders;

use App\Models\Informations\Information;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Information::factory(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
