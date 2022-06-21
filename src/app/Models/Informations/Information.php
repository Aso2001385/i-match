<?php

namespace App\Models\Informations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'contents',
        'read',
        'category_id',
        'url',
    ];
}
