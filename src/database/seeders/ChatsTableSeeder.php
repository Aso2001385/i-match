<?php

namespace Database\Seeders;

use App\Models\Chats\Chat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Chat::factory(50)->create();
        Schema::enableForeignKeyConstraints();
    }
}
