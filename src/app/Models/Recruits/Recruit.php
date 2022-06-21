<?php

namespace App\Models\Recruits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'contents',
        'purpose_id',
        'persons',
        'due',
    ];
}
