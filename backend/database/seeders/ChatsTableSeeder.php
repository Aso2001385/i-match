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
        $room_ids=[1,1, 2,2,2, 3,3,3,3, 4,4,4,4,4, 5];
        $user_ids=[1,2, 2,1,3, 3,1,2,4, 4,1,2,3,5, 5];
        Schema::disableForeignKeyConstraints();
        for($i=0; $i<count($room_ids);$i++){
            $chats=[
                'room_id'=>$room_ids[$i],
                'user_id'=>$user_ids[$i],
                'message'=>"message".$i
            ];
            Chat::create($chats);
        }
        Schema::enableForeignKeyConstraints();
    }
}
