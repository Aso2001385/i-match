<?php

namespace App\Models\Recruits;

use App\Models\Skills\Skill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Exception;

class RecruitSkill extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'recruit_id',
        'skill_id',
        'level',
    ];

    protected $table = "recruit_skill";

    public static function get_recruit_skill($recruit_skill){
        try{
            $recruit_skill->name=Skill::find($recruit_skill->skill_id)->name;
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }

        return [
            'result' => $recruit_skill,
            'status' => $status
        ];
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
                'result' => $e,
                'status' => $e->getCode()
            ];
        }

        return [
            'result' => $result,
            'status' => $status
        ];
    }

    public static function update_recruit_skill($recruit_skill,$request){
        try{
            $recruit_skill->update($request->all());

            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }
        return [
            'result' => $recruit_skill,
            'status' => $status
        ];
    }

    public static function delete_recruit_skill($recruit_skill) {
        try{
            $recruit_skill->delete();
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => $e,
                'status' => $e->getCode()
            ];

        }

        return [
            'result' => [],
            'status' => $status
        ];
    }

}
