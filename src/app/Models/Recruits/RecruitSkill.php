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
}
