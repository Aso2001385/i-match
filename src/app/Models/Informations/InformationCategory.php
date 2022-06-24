<?php

namespace App\Models\Informations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
