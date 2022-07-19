<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skills\SkillCategory;
use App\Models\Users\UserSkill;
use App\Models\Recruits\RecruitSkill;
use Exception;
use Illuminate\Http\Response;

class Skill extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'category_id',
        'name',
    ];


    public static function create_skill($request)
    {
        try{
            Skill::create($request->all());
            $result = 'success!';

            $status = Response::HTTP_OK;

        }catch(Exception $e){
            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];
        }

        return [
            'result' => $result,
            'status' => $status,
        ];
    }

    public static function get_skill($skill)
    {

        try{
            $skill_category =SkillCategory::find($skill->category_id);
            $skill->category_name = $skill_category->name;
            $status=Response::HTTP_OK;

        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        
        return [
            'result' => $skill,
            'status' => $status=Response::HTTP_OK
        ];
    
    }

    public static function update_skill($skill,$request)
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

    public static function delete_skill($skill){
        try{
            $user_skills=UserSkill::where('skill_id',$skill->id)->whereNull('deleted_at')->get();
            foreach($user_skills as $user_skill){
                UserSkill::delete($user_skill);
            }
            $skill->delete();
            $status= Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' => [],
            'status' => $status
        ];
    }
}
