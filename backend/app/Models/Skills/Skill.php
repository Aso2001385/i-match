<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skills\SkillCategory;
use Exception;
use Illuminate\Http\Response;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'depth',
    ];

    public static function get_skill($skill){

        try{
            $skill_categories = SkillCategory::get_skill_category($skill->category_id);

            if(!$skill_categories['success']){
                throw new Exception();
            }
            $skill->toArray();
            $skill['category'] = $skill_categories['result'];
    
            $status = Response::HTTP_OK;

        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        
        return [
            'result' => $skill,
            'status' => $status
        ];
    
    }

    public function update_skill($skill,$request)
    {
        try{
            $skill->update($request->all());
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => $skill,
            'status' => $status
        ];
    }
}
