<?php

namespace App\Models\Recruits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Exception;

class RecruitSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruit_id',
        'skill_id',
        'level',
    ];

    protected $table = "recruit_skill";

    public static function get_skills($recruit){

        $recruit['skills'] = RecruitSkill::Join('skills', 'skills.id', '=', 'recruit_skill.skill_id')
        ->select('recruit_skill.*','skills.name')
        ->where('recruit_skill.recruit_id',$recruit['id'])
        ->get()->toArray();

        return $recruit;

    }

    public static function create_rec_skill($request,$recruit){
        try{
            foreach($request->skills as $skill){
                $request2=collect(
                    ['recruit_id'=>$recruit->id,'skill_id'=>$skill['skill_id'],'level'=>$skill['level']]
                );
            $result='success!';
            RecruitSkill::create($request2->all());
            $status=Response::HTTP_OK;
            }
        }catch(Exception $e){
            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];
        }

        return [
            'result' => $result,
            'status' => $status
        ];
    }

    public static function merge_skills($recruits){

        $recruits = array_map('get_skills',$recruits);
        return $recruits;

    } 

}
