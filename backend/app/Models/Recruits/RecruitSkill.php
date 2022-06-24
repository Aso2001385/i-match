<?php

namespace App\Models\Recruits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruit_id',
        'skill_id',
        'level',
    ];

    public static function get_skills($recruit){

        $recruit['skills'] = RecruitSkill::Join('skills', 'skills.id', '=', 'reqruit_skill.skill_id')
        ->select('reqruit_skill.*','skills.name')
        ->where('reqruit_skill.recruit_id',$recruit['id'])
        ->get()->toArray();

        return $recruit;

    }

    public static function merge_skills($recruits){

        $recruits = array_map('get_skills',$recruits);
        return $recruits;

    } 

}
