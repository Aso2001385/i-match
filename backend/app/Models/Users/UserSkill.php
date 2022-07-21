<?php

namespace App\Models\Users;

use App\Models\Skills\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class UserSkill extends Model
{
    use HasFactory,softDeletes;

    protected $table = 'user_skill';

    protected $fillable = [
        'user_id',
        'skill_id',
        'level',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public static function store_skills($request){

        try{
            UserSkill::create($request->all());
            $result = 'success!';
            $status = Response::HTTP_OK;
        }catch(Exception $e){
            return [
                'result' => $e,
                'status' => $e->getCode()
            ];
        }
   
        return [
            'result' => $user_skills,
            'status' => $status,
        ];
    }

    public static function upsert_skills($user_skill,$request){

        try{
            $user_skill->update($request->all());
            $status = Response::HTTP_OK;
        }catch(Exception $e){
            return [
                'result' => $e,
                'status' => $e->getCode()
            ];
        }
   
        return [
            'result' => $user_skills,
            'status' => $status,
        ];

    }
    
    public static function delete_skill($user_skill){

        try{       
            $user_skill->delete();

            $status= Response::HTTP_OK;
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