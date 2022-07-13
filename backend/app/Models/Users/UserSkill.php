<?php

namespace App\Models\Users;

use App\Models\Skills\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class UserSkill extends Model
{
    use HasFactory;

    protected $table = 'user_skill';

    protected $fillable = [
        'user_id',
        'skill_id',
        'practical_flag',
        'learning_flag',
        'level',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public static function store_skills(Request $request){

        try{
            $skills = $request->skills;
            for($i=0; $i<count($skills); $i++){
                $skills[$i]['user_id'] = $request->user_id;
            }
            UserSkill::insert($skills);
            $user_skills = UserSkill::where('user_id',$request->user_id)->get()->toArray();
            $status = Response::HTTP_OK;
        }catch(Exception $e){
            $user_skills = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
   
        return [
            'result' => $user_skills,
            'status' => $status,
        ];
    }

    public static function upsert_skills(Request $request){

        try{
            $skills = $request->skills;
            for($i=0; $i<count($skills); $i++){
                $skills[$i]['user_id'] = $request->user_id;
            }
            UserSkill::upsert($skills,['id'],['practical_flag','learning_flag','level']);
            $user_skills = UserSkill::where('user_id',$request->user_id)->get()->toArray();
            $status = Response::HTTP_OK;
        }catch(Exception $e){
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
   
        return [
            'result' => $user_skills,
            'status' => $status,
        ];

    }
    
    public static function delete_skill(Request $request){

        try{       
            $record_count = UserSkill::where('id',$request->id)->delete();
            $status =  $record_count == 1 ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST;
        }catch(Exception $e){
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
   
        return [
            'result' => 'success',
            'status' => $status,
        ];
    }

}