<?php

namespace App\Models\Recruits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Example;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Exception;

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

    public static function create_recruits($request){
        try{

            $recruit = Recruit::create($request->all());
            $result = 'success!';

            $status = Response::HTTP_OK;

        }catch(Exception $e){

            $result = $e;

            $status = Response::HTTP_BAD_REQUEST;
        }

        return [
            'result' => $result,
            'status' => $status,
        ];
    }

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

    public static function get_user_recruits($recruit){

        try{
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

    public static function update_recruit($recruit,$request)
    {
        try{
            $recruit->update($request->all());
            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => $recruit,
            'status' => $status
        ];
    }

    public static function delete_recruit($request){
        try{
            Recruit::find($request->id)->delete();
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
