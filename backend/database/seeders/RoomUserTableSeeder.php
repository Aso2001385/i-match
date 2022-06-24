<?php

namespace Database\Seeders;

use App\Models\Chats\RoomUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoomUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        RoomUser::factory(40)->create();
        Schema::enableForeignKeyConstraints();
    }
}
