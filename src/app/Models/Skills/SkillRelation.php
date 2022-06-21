<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'primary_skill_id',
        'secondary_skill_id',
    ];
}
