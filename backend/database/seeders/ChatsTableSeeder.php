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
        //$room_ids=[1,1, 2,2,2, 3,3,3,3, 4,4,4,4,4, 5, 6,6,6,6,6,6,6,6,6,6];
        //$user_ids=[1,2, 2,1,3, 3,1,2,4, 4,1,2,3,5, 5, 6,1,2,3,4,5,7,8,9,10];
        $messages=array(
            1=>[1,2],
            2=>[2,1,3],
            3=>[3,1,2,4],
            4=>[4,1,2,3,5],
            5=>[5],
            6=>[6,1,2,3,4,5,7,8,9,10]
        );
        Schema::disableForeignKeyConstraints();
        foreach($messages as $key=>$value){
            for($i=0; $i<5; $i++){
                $chats = [
                    'room_id'=>$key,
                    'user_id'=>$value[rand(0, count($value)-1)],
                    'message'=>"message".$i
                ];
                Chat::create($chats);
            }
        }
        // for($i=0; $i<count($messages);$i++){
        //     $chats=[
        //         'room_id'=>$room_ids[$i],
        //         'user_id'=>$user_ids[$i],
        //         'message'=>"message".$i
        //     ];
        //     Chat::create($chats);
        // }
        Schema::enableForeignKeyConstraints();
    }
}
