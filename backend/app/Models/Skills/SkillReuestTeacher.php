<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillReuestTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_request_id',
        'skill_id',
        'teacher_id',
    ];
}
