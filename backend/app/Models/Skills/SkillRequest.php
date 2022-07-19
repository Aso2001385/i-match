<?php

namespace App\Models\Skills;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Http\Response;

class SkillRequest extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'message',
    ];

    public static function create_skill_request($request){
        try{
            SkillRequest::create($request->all());

            $result='success!';

            $status = Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' =>$result,
            'status' => $status
        ];
    }

    public static function get_skill_request($skill_request){
        try{
            $skill_request->user_name=User::find($skill_request->user_id)->name;

            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }
        return [
            'result' =>$skill_request,
            'status' => $status
        ];
    }

    public static function delete_request_skill($skill_request){
        try{
            $skill_request->delete();

            $status=Request::HTTP_OK;
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
