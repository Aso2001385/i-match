<?php

namespace Database\Seeders;

use App\Models\Recruits\Recruit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RecruitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $purpose_array=['勉強会','開発','その他'];
        $mindate=strtotime(date('Y-m-d', strtotime('+7 day')));
        $maxdate=strtotime(date('Y-m-d', strtotime('+14 day')));
        Schema::disableForeignKeyConstraints();
        $persons_array=[2, 3, 4, 5, 3, 11];


        for($i=0; $i<count($persons_array); $i++){
            $user_id=$i+1;
            $room_id=$i+1;
            $title="title".$i;
            $contents="content".$i;
            $purpose=$purpose_array[rand(0, 2)];
            $persons=$persons_array[$i];
            $due=date('Y-m-d', rand($mindate, $maxdate));
            $recruit = [
                'user_id'=>$user_id,
                'room_id'=>$room_id,
                'title'=>$title,
                'contents'=>$contents,
                'purpose'=>$purpose,
                'persons'=>$persons,
                'due'=>$due
            ];
            Recruit::create($recruit);
        }


        Schema::enableForeignKeyConstraints();
    }
}
