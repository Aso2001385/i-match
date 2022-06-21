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
}
