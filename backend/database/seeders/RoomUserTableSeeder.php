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
        ////$persons_array=[2, 3, 4, 5, 3];
        Schema::disableForeignKeyConstraints();
        $room_ids=[1,1, 2,2,2, 3,3,3,3, 4,4,4,4,4, 5];
        $user_ids=[1,2, 2,1,3, 3,1,2,4, 4,1,2,3,5, 5];
        $name=    ["room1","room1",  "room2","room2","room2",  "room3","room3","room3","room3",  "room4","room4","room4","room4","room4",  "room5"];
        Schema::disableForeignKeyConstraints();
        for($i=0; $i<count($room_ids);$i++){
            $room_user=[
                'room_id'=>$room_ids[$i],
                'user_id'=>$user_ids[$i],
                'name'=>$name[$i]
            ];
            RoomUser::create($room_user);
        }
        Schema::enableForeignKeyConstraints();
    }
}
