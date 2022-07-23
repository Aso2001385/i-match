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

    public static function bulk_insert_skills($skills,$recruit_id){

        try{

            // return ['result' => $skills,'status' => 200];

            $result = array_map( function ($skill) use ($recruit_id){
                return ['recruit_id' => $recruit_id,'skill_id' => $skill['id'],'level' => 3];
            },$skills);

            RecruitSkill::upsert($result,['recruit_id','skill_id']);

        }catch(Exception $e){

            return ['result'=>$e,'status'=>$e->getCode()];

        }

        return ['result' => true,'status' => 200];

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
