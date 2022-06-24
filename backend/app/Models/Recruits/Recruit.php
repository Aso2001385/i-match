<?php

namespace App\Models\Recruits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class Recruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'contents',
        'purpose_id',
        'persons',
        'due',
    ];

    public static function get_recruits(){

        try{

            $recruits = Recruit::whereNull('deleted_at')
            ->get()->toArray();

            $recruits = RecruitSkill::merge_skills($recruits);
            $recruits = RecruitUser::marge_user_count($recruits);

            $status = Response::HTTP_OK;
    
        }catch(Example $e){

            $recruits = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

        }
        
        return [
            'result' => $recruits,
            'status' => $status,
        ];

    }

    public static function get_user_recruits($user_id){

        try{

            $recruits = Recruit::where('user_id',$user_id)
            ->whereNull('deleted_at')->get()->toArray();

            $recruits = RecruitSkill::merge_skills($recruits);
            $recruits = RecruitUser::marge_user_count($recruits);

            $status = Response::HTTP_OK;
    
        }catch(Example $e){

            $recruits = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

        }
        
        return [
            'result' => $recruits,
            'status' => $status,
        ];

    }

    public static function get_other_recruits($user_id){

        try{

            $recruits = Recruit::where('user_id','<>',$user_id)
            ->whereNull('deleted_at')->get()->toArray();

            $recruits = RecruitSkill::merge_skills($recruits);
            $recruits = RecruitUser::marge_user_count($recruits);

            $status = Response::HTTP_OK;
    
        }catch(Example $e){

            $recruits = [];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

        }
        
        return [
            'result' => $recruits,
            'status' => $status,
        ];

    }

}
