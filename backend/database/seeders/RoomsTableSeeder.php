<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20;$i++){
            $rooms=[
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            DB::table('rooms')->insert($rooms);
        }
    }
}
