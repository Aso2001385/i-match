<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SkillCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function get_skill_category($category_id)
    {
        try{
            $skill_categories=DB::table('skill_categories')
            ->select('name')
            ->where('id',$category_id)
            ->get()->toArray();

            $success = true;
        }catch(Exception $e){
            $skill_categories = [];
            $success = false;
        }

        return [
            'result' => $skill_categories,
            'success' => $success,
        ];
    }
}
