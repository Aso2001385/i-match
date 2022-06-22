<?php

namespace App\Models\Recruits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruit_id',
        'user_id',
    ];

    public static function get_users($recruit){

        $recruit['user_count'] = RecruitUser::where('recruit_id',$recruit['id'])->count();

        return $recruit;

    }

    
    public static function merge_user_count($recruits){

        $recruits = array_map('get_users',$recruits);
        return $recruits;

    } 
}
